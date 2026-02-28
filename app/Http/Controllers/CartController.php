<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Product;
use App\Models\BillingAddress;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = Cart::getContent();
        if(sizeof($cartItems)==0){
            return redirect()->route('index');
        }
        $page_title ="Cart";
        return view('website.cart', compact('cartItems','page_title'));
    }
    public function addToCart(Request $request)
    {
        $product = \App\Models\Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $variation = null;
        $variationName = '';
        $variationImage = '';
        if ($request->variation_id) {
            $variation = \App\Models\Variations::find($request->variation_id);
            $variationName = $variation ? $variation->name : '';
            $variationImage = $variation && $variation->image ? $variation->image : '';
        }

        Cart::add([
            'id' => $product->id . ($variation ? '-' . $variation->id : ''),
            'name' => $product->name,
            'price' => $request->product_price,
            'quantity' => $request->quantity,
            'product_id' => $product->id,
            'attributes' => [
                'product_image' => $variationImage ?: $product->image,
                'product_type' => $product->product_type,
                'variation_id' => $request->variation_id,
                'variation_name' => $variationName,
                'business_card_id' => $product->id,
                'category_id' => $product->category_id,
                'sub_category_id' => $product->sub_category_id ?? null,
            ]
        ]);

        return redirect()->route('cart.list')->with('success', 'Product added to cart!');
    }

    public function updateCart(Request $request)
    {
        $itemids = $request->id;
        $quantites = $request->quantity;
        $count= 0;
        foreach($itemids as $row){
            Cart::update($row,['quantity' => ['relative' => false,'value' => $quantites[$count]],]);
            $count++;
        }
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->product_id);
        return 1;
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function applyCoupon(Request $request)
    {
        $details = Coupon::where('coupon_code', $request->coupon_code)->first();
        if($details){
            if($details->expire_date < date('Y-m-d')){
                return response()->json([
                    'status' => 'expired',
                ]);
            }else if($details->status==0 ){
                return response()->json([
                    'status' => 'in-active',
                ]);
            }else if($details->max_purchase && Auth::check()){
                // Only check usage limits for logged-in users
                $usages = CouponUsage::where('user_id', Auth::user()->id)->where('coupon_code', $request->coupon_code)->get();
                if(!empty($usages) && sizeof($usages)>=$details->max_purchase ){
                    return response()->json([
                        'status' => 'used',
                    ]);
                }else{
                    CouponUsage::create([
                        'user_id' => Auth::user()->id,
                        'coupon_code' => $request->coupon_code,
                        'usages' => 1,
                    ]);
                }
            }

            if($details->coupon_type=='fix'){
                $discount_details = ([
                    'coupon_id' => $details->id,
                    'coupon' => $details->coupon_code,
                    'type' => $details->coupon_type,
                    'discount' => $details->discount,
                ]);

                Session::put('discount', $discount_details);

                $items = Cart::session('cart_data')->getContent('id');

                return response()->json([
                    'status'=> 'true',
                ]);

            }else if($details->coupon_type=='percent'){
                $total = Cart::getTotal();
                $discount = $total*$details->discount/100;

                $discount_details = ([
                    'coupon_id' => $details->id,
                    'coupon' => $details->coupon_code,
                    'type' => $details->coupon_type,
                    'discount' => $discount,
                ]);

                Session::put('discount', $discount_details);

                return response()->json([
                    'status'=> 'true',
                ]);
            }
        }else{
            return response()->json([
                'status' => 'not-found',
            ]);
        }
    }

    //remove coupon
    public function removeCoupon(Request $request)
    {
        $discount = Session::get($request->session_key);

        // Only remove usage record for logged-in users
        if(Auth::check()) {
            $usage = CouponUsage::orderby('id', 'desc')->where('coupon_code', $discount['coupon'])->where('user_id', Auth::user()->id)->first();
            if($usage){
                $usage->delete();
            }
        }
        
        Session::forget($request->session_key);
        
        return response()->json([
            'status'=> 'true',
        ]);
    }
    public function checkOut ()
    {

       /*  if(Auth::check()){            
            $Items = Cart::getContent(); 
            $billing_addresses = BillingAddress::where('customer_id', Auth::user()->id)->where('status', 1)->get();
            return view('website.check-out', compact('Items', 'billing_addresses'));
         }else{
             session()->flash('login-first', 'Sorry, you must be logged in!');
             return redirect()->route('login');
         } */
        $Items = Cart::getContent(); 
        
        // Check if cart is empty
        if($Items->isEmpty()) {
            return redirect()->route('cart.list')->with('error', 'Your cart is empty. Please add products before checking out.');
        }
        
        // Get billing addresses for logged-in users
        $billing_addresses = collect();
        if (Auth::check()) {
            $user = Auth::user();
            // For Company users: sync company profile billing (company/profile/edit) into billing_addresses so it shows in Select Billing Address as default
            if (strtolower((string) ($user->account_type ?? '')) === 'company') {
                $company = $user->administeredCompany ?? $user->company;
                if ($company && $this->companyHasBillingInfo($company)) {
                    $this->syncCompanyBillingToAddress($user, $company);
                }
            }
            $query = BillingAddress::where('customer_id', (string) $user->id)->where('status', 1);
            if (Schema::hasColumn('billing_addresses', 'is_company_profile')) {
                $query->orderByRaw('COALESCE(is_company_profile, 0) DESC');
            }
            $billing_addresses = $query->get();
        }

        return view('website.check-out', compact('Items', 'billing_addresses'));
    }

    public function successPurchase(Request $request){
        return $request;
    }
    public function failedPurchase(Request $request){
        return 'failed purchase';
    }
    public function ipnSuccessPurchase(Request $request){
        return 'ipn sucess purchase';
    }
    public function ipnFailedPurchase(Request $request){
        return 'ipn failed purchase';
    }

    public function testAttempt(Request $request){
        return $request;
    }

    /**
     * Check if company has any billing info (companies table fields).
     */
    protected function companyHasBillingInfo(Company $company): bool
    {
        return !empty(trim($company->billing_address_line_1 ?? ''))
            || !empty(trim($company->city ?? ''))
            || !empty(trim($company->billing_email ?? ''));
    }

    /**
     * Sync company billing (companies table) to one BillingAddress so it appears on checkout.
     */
    protected function syncCompanyBillingToAddress($user, Company $company): void
    {
        $name = trim($company->primary_contact_name ?? $user->name ?? '');
        $parts = $name !== '' ? explode(' ', $name, 2) : ['', ''];
        $firstName = $parts[0] ?? '';
        $lastName = $parts[1] ?? '';

        $street = trim($company->billing_address_line_1 ?? '');
        if (!empty(trim($company->billing_address_line_2 ?? ''))) {
            $street .= ', ' . trim($company->billing_address_line_2);
        }

        $data = [
            'first_name' => $firstName ?: 'Company',
            'last_name' => $lastName ?: 'Account',
            'company' => $company->name ?? null,
            'country' => $company->billing_country ?? null,
            'street' => $street ?: null,
            'state' => $company->state ?? null,
            'town' => $company->city ?? null,
            'postcode' => $company->zip_code ?? null,
            'phone' => $company->billing_phone ?? null,
            'email' => $company->billing_email ?? $user->email ?? '',
            'status' => 1,
        ];
        if (Schema::hasColumn('billing_addresses', 'is_company_profile')) {
            $data['is_company_profile'] = true;
        }

        // Only create company-profile row when it does not exist — never overwrite (edits from company/profile/edit or billing_address must persist)
        if (!Schema::hasColumn('billing_addresses', 'is_company_profile')) {
            return;
        }
        $uniqueKey = [
            'customer_id' => (string) $user->id,
            'is_company_profile' => true,
        ];
        BillingAddress::firstOrCreate($uniqueKey, $data);
    }
}
