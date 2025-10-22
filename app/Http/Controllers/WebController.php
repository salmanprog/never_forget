<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\Blogs;
use App\Models\Catering;
use App\Models\Faq;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\WhyChooseUs;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\Variations;
use App\Models\Favorite;
use App\Models\CareerCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\Career;
use App\Models\Collaborator;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use DB;
class WebController extends Controller
{
    public function index ()
    {  
        $page_title = 'Home || Never Forget';
        $abouts=AboutUs::where('status' , 1)->first();
        $testimonials=Testimonial::where('status' ,  1)->get();
        $products = Product::where('status' , 1)->get();
        $questions = Faq::where('status',1)->get();
        $chooseus = WhyChooseUs::where('status' , 1)->get();
        $collaborators = Collaborator::where('status' , 1)->get();
        $categories = Category::with(['products' => function($query) {
            $query->where('status', 1);  // Only get active products
        }])->where('status', 1)->get();
        $products = Product::orderby('id', 'ASC')->where('status', 1)->get();
        return view('website.index', compact('page_title','abouts' , 'products' , 'testimonials' , 'questions' , 'chooseus' , 'categories' , 'products' , 'collaborators'));
    }

    public function aboutUs()
    {
        $page_title = 'About Us || Never Forget';
        $abouts=AboutUs::where('status' ,  1)->first();
        $collaborators = Collaborator::where('status' , 1)->get();  
        return view('website.about-us'  , compact('abouts','page_title','collaborators'));
    }
    
    public function corporateSolutions()
    {
        $page_title = 'Corporate Solutions || Never Forget';
        $corporatesolutions=AboutUs::where('status' ,  1)->first();
        return view('website.corporate-solutions'  , compact('corporatesolutions','page_title'));
    }
    
    public function testimonials()
    {
        $page_title = 'Testimonials || Never Forget';
        $testimonials=Testimonial::where('status' ,  1)->get();
        $videos=Testimonial::where('status' ,  1)->where('video', '!=', null)->get();
        return view('website.testimonials'  , compact('testimonials','page_title','videos'));
    }
   
    public function blogs()
    {
        $page_title = 'Blogs || Never Forget'; 
        return view('website.blogs'  , compact('page_title'));
    }
    
   
    public function shop ()
    {
        $page_title = 'Shop || Never Forget';
        $products = Product::orderby('id', 'ASC')->where('status', 1)->get();
        $categories = Category::with(['products' => function($query) {
            $query->where('status', 1);  // Only get active products
        }])->where('status', 1)->get();
        
        $customer_favorites = Product::whereIn('id', function($query) {
            $query->select('product_id')
                  ->from('favorites')
                  ->where('status', 1);
        })->where('status', 1)->get();

        return view('website.shop', compact('page_title', 'categories', 'products', 'customer_favorites'));
    }
    
    public function Career ()
    {
        $page_title = 'Careers || Never Forget';
        $categories = CareerCategory::with(['careers' => function($query) {
            $query->where('status', 1)->orderBy('id', 'ASC');
        }])->where('status', 1)->get();
        
        // Get all careers for the "All" tab
        $all_careers = Career::with('hasCategory')->where('status', 1)->orderBy('id', 'ASC')->get();
        
        return view('website.careers', compact('page_title', 'categories', 'all_careers'));
    }
    
    public function disclaimer ()
    {
        $page_title = 'Disclaimer || Never Forget';  
        return view('website.disclaimer', compact('page_title'));
    }
    public function cookiePolicy ()
    {
        $page_title = 'Cookie Policy || Never Forget';  
        return view('website.cookie-policy', compact('page_title'));
    }
    public function privacyPolicy ()
    {
        $page_title = 'Privacy Policy || Never Forget';  
        return view('website.privacy-policy', compact('page_title'));
    }

    public function loadMoreCareers(Request $request)
    {
        $page = $request->get('page', 1);
        $perPage = 6; // Adjust as needed
        
        $careers = Career::with('hasCategory')
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->paginate($perPage, ['*'], 'page', $page);
            
        return response()->json([
            'careers' => $careers->items(),
            'hasMore' => $careers->hasMorePages()
        ]);
    }

    public function loadMoreCategoryCareers(Request $request, $categoryId)
    {
        $page = $request->get('page', 1);
        $perPage = 6; // Adjust as needed
        
        $careers = Career::with('hasCategory')
            ->where('status', 1)
            ->where('career_category_id', $categoryId)
            ->orderBy('id', 'ASC')
            ->paginate($perPage, ['*'], 'page', $page);
            
        return response()->json([
            'careers' => $careers->items(),
            'hasMore' => $careers->hasMorePages()
        ]);
    }

    public function careerApplicationForm(Request $request)
    {
        $page_title = 'Career Application || Never Forget';
        $career_id = $request->get('career_id');
        $career = null;
        
        if ($career_id) {
            $career = Career::with('hasCategory')->where('id', $career_id)->where('status', 1)->first();
        }
        
        return view('website.career-application', compact('page_title', 'career'));
    }

    public function howItWorks()
    {
        $page_title = 'How It Works || Never Forget';
        $howitworks=AboutUs::where('status' ,  1)->first();
        return view('website.how-it-works'  , compact('howitworks','page_title'));
    }


    public function contactus()
    {
        $page_title = 'Contact Us || Never Forget';
        $contactus=ContactUs::where('status',1)->first();
        return view('website.contact-us', compact('page_title','contactus'));
    }

    public function specialOffers()
    {
        $page_title = 'Special Offers || Never Forget';
        $products = Product::where('status' , 1)->where('is_special' , 1)->get();
       /*  $category = Category::orderby('id', 'ASC')->where('status', 1)->first(); */
        return view('website.special-offers'  , compact('page_title','products'/* ,'category' */));
    }

    public function reviews()
    {
        $page_title = 'Customers Reviews || Never Forget';
        return view('website.reviews'  , compact('page_title'));
    }
    

    public function categoryProducts(Request $request)
    {
        $page_title = 'Products';
        $category_id = $request->id;

        if (isset($category_id)) {
            $slugdata = explode('-', $category_id);
            // Check if there are at least two elements in the $slugdata array
            if (count($slugdata) >= 2) {
                $category_id = $slugdata[0];
                $sub_category_id = $slugdata[1];
                $products = Product::orderby('id', 'ASC')->where('category_id', $category_id)->where('sub_category_id', $sub_category_id)->where('status', 1)->paginate(12);
                $category = Category::orderby('id', 'ASC')->where('id', $category_id)->where('status', 1)->first();
                $subcategory = Category::orderby('id', 'ASC')->where('id', $sub_category_id)->where('status', 1)->first();
                // Now you can use $parantslug and $categoryslug as needed
            } else {
                $category_id = $slugdata[0];
                $products = Product::orderby('id', 'ASC')->where('category_id', $category_id)->where('status', 1)->paginate(12);
                $category = Category::orderby('id', 'ASC')->where('id', $category_id)->where('status', 1)->first();
                $subcategory = [];
            }
        }
    

       
        if ($request->ajax()) {
            $view = view('website.product-ajax', compact('products'))->render();
            $pagination = $products->links('pagination::bootstrap-4')->toHtml();
    
            return response()->json([
                'html' => $view,
                'pagination' => $pagination,
            ]);
        }
    
        return view('website.products', compact('category','subcategory', 'products', 'page_title'));
    }
    
    public function searchProducts(Request $request)
    {
        $page_title = 'Search Products';
        $products = Product::orderby('id', 'ASC')->where('name', 'like', '%'. $request->search.'%')->where('status', 1)->get();
        return view('website.search-products', compact('products', 'page_title'));
    }
    
    public function singleProduct($slug)
    {
        $page_title = 'Single Products';
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            return redirect()->route('shop')->with('error', 'Product not found');
        }
        
        $related_products = [];
        if(isset($product->related_product)){
            $related_p = json_decode($product->related_product);
            foreach($related_p as $id){
               $related_products[] = Product::where('id', $id)->first();
            }
        }
        
        $product_price = $product->product_price;
        $variations = collect([]);
        $variation_id = "";
        
        if($product->product_type == 1 && $product->variations){
            // Get variations from the JSON data
            $variationsData = json_decode($product->variations, true);
            if (!empty($variationsData)) {
                $variations_array = [];
                foreach ($variationsData as $var) {
                    // Get variation name from Variations model
                    $variationName = Variations::where('id', $var['variation_id'])->value('name');
                    $variations_array[] = [
                        'id' => $var['variation_id'],
                        'name' => $variationName ?? 'Unknown Variation',
                        'price' => $var['price'],
                        'image' => $var['image'] ?? null
                    ];
                }
                $variations = collect($variations_array);
                
                if ($variations->isNotEmpty()) {
                    $firstVariation = $variations->first();
                    $product_price = $firstVariation['price'];
                    $variation_id = $firstVariation['id'];
                }
            }
        }

        return view('website.product-details', compact('product','page_title','related_products','product_price','variations','variation_id'));
    }
    
    public function store(Request $request)
    {
        $accountType = $request->account_type ?? 'Individual';
        
        if ($accountType === 'Individual') {
            return $this->registerIndividual($request);
        } else {
            return $this->registerCompany($request);
        }
    }

    private function registerIndividual(Request $request)
    {
        $this->validate($request, [
            'account_type' => 'required|in:Individual,Company',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
        ]);

        do{
            $verify_token = uniqid();
        }while(User::where('verify_token', $verify_token)->first());
        
        do{
            $user_id = rand(1000, 9999);
        }while(User::where('user_id', $user_id)->first());

        $user = User::create([
            'name' => $request->first_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'account_type' => 'Individual',
            'verify_token' => $verify_token,
            'user_id' => $user_id,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole("Individual");

        $details = [
            'from' => 'verify',
            'title' => "Hi ".$request->first_name.' '.$request->last_name.',',
            'body' => "Thanks for creating an account on NEVER FORGET Showing Appreciation. Your username is <b>".$request->email."</b>. You can access your account, and more at: ",
            'regard' => 'We look forward to seeing you soon.',
            'account_type' => 'Individual',
        ];

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            \Mail::to($user->email)->send(new \App\Mail\Email($details));
            return redirect()->intended('login')->with('success', 'Register successfully');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }

       // return redirect()->back()->with('message', 'We have sent verification email. Click on link and get activation');
    }

    private function registerCompany(Request $request)
    {
        $this->validate($request, [
            'account_type' => 'required|in:Individual,Company',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
        ]);

        do{
            $verify_token = uniqid();
        }while(User::where('verify_token', $verify_token)->first());
        
        do{
            $user_id = rand(1000, 9999);
        }while(User::where('user_id', $user_id)->first());

        $user = User::create([
            'name' => $request->first_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'account_type' => 'Company',
            'verify_token' => $verify_token,
            'user_id' => $user_id,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole("Company");

        $details = [
            'from' => 'verify',
            'title' => "Hi ".$request->first_name.' '.$request->last_name.',',
            'body' => "Thanks for creating a company account on NEVER FORGET Showing Appreciation. Your username is <b>".$request->email."</b>. You can access your account area to view orders, and more at: ",
            'regard' => 'We look forward to seeing you soon.',
            'account_type' => 'Company',
        ];

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            \Mail::to($user->email)->send(new \App\Mail\Email($details));
            return redirect()->intended('dashboard')->with('success', 'Company account registered successfully');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function verifyEmail($token)
    {
        $user = User::where('verify_token', $token)->first();
        if(!empty($user)){
            $user->verify_token = null;
            $user->email_verified_at = date('Y-m-d H:i:s');
            if(!empty($user->temprary_email)){
                $user->email = $user->temprary_email;
                $user->temprary_email = null;
            }
            $user->update();

            return redirect()->route('login')->with('success', 'You are welcome. You can login from here.');
        }else{
            return redirect()->back()->with('error', 'Your token is expired');
        }
    }
    public function cartLogin(Request $request)
    {
        Session::put('slug', $request->slug);
        return redirect()->route('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if (!empty($user) && $user->status == 1) {
            if (Auth::attempt($credentials)) {
                /** @var User $user */
                $user = Auth::user();
                
                // Redirect based on role
                if ($user->hasRole('Admin')) {
                    return redirect()->route('dashboard');
                } elseif ($user->hasRole('Individual')) {
                    return redirect()->route('dashboard');
                } elseif ($user->hasRole('Company')) {
                    return redirect()->route('dashboard');
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Unauthorized role.');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to login, try again!');
            }
        } elseif (!empty($user) && $user->status == 0) {
            return redirect()->back()->with('error', 'Your account is not active. Please verify your email.');
        } else {
            return redirect()->back()->with('error', 'User not found!');
        }
    }


    public function logOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotPassword()
    {
        $page_title = 'Forgot Password';
        return view('auth.passwords.forgot-password', compact('page_title'));
    }
    public function passwordResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->first();
        if(empty($user)){
            return redirect()->back()->with('error', 'Your account not found.');
        }elseif($user->status != 1){
            return redirect()->back()->with('error', 'Your account is not verified. We have sent verification email verify first.');
        }
        if(!empty($user) && $user->status==1 && $user->hasRole('User')){
            $page_title = 'Change Password';
            do{
                $verify_token = uniqid();
            }while(User::where('verify_token', $verify_token)->first());

            $user->verify_token = $verify_token;
            $user->update();

            $details = [
                'from' => 'password-reset',
                'title' => "Hello!",
                'body' => "You are receiving this email because we received a password reset request for your account.",
                'verify_token' => $user->verify_token,
            ];

            \Mail::to($user->email)->send(new \App\Mail\Email($details));

            return redirect()->route('login')->with('success', 'We have emailed your password reset link!');
        }else{
            return redirect()->back()->with('error', 'You have not allow to access this panel.');
        }
    }
    public function resetPassword($verify_token)
    {
        $page_title = 'Reset Password';
        return view('auth.passwords.change-password', compact('page_title', 'verify_token'));
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|same:password_confirmation',
        ]);

        $user = User::where('verify_token', $request->verify_token)->where('status', 1)->first();
        $user->password = Hash::make($request->password);
        $user->verify_token = null;
        $user->update();

        if($user){
            return redirect()->route('login')->with('message', 'You have updated password. You can login now.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong try again');
        }
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;

        if(!empty($request->current_password)){
            if (!Hash::check($request->current_password, $userPassword)) {
                return back()->withErrors(['current_password'=>'Current password does not match']);
            }else{
                $request->validate([
                    'current_password' => 'required',
                    'password' => 'required|same:confirm_password|min:6',
                    'confirm_password' => 'required',
                ]);
                $user->password = Hash::make($request->password);
            }
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success','Profile successfully updated');
    }

    public function sendEmail(Request $request)
    {
        if(!isset($request->type)){
            $this->validate($request, [
                'email' => 'required|email|unique:users,email',
            ]);
        }

        $user = User::where('email', Auth::user()->email)->first();

        do{
            $verify_token = uniqid();
        }while(User::where('verify_token', $verify_token)->first());

        $user->temprary_email = $request->email;
        $user->verify_token = $verify_token;
        $user->update();

        $details = [
            'from' => 'verify',
            'title' => "We have received update email request. First, you need to confirm your account. Just press the button below.",
            'body' => "If you have any questions, just reply to this email—we're always happy to help out.",
            'verify_token' => $user->verify_token,
        ];

        \Mail::to($request->email)->send(new \App\Mail\Email($details));

        return redirect()->back()->with('message', 'We have sent verification email. Click on link and get activation');
    }
    
    public function billingAddress ()
    {
        $address = BillingAddress::where('customer_id', Auth::user()->id)->first();
        return view('website.billing-address', compact('address'));
    }
    public function cartList ()
    {
        return redirect()->route('cart.list');
    }
    public function cart ()
    {
        $cartItems = Cart::getContent();
        $page_title = 'Cart';
        return view('website.cart', compact('cartItems', 'page_title')); 
    }

    public function faqs ()
    {
        $page_title = 'FAQs';
		$questions = Faq::where('status',1)->get();
        return view('website.faqs' , compact('questions','page_title'));
    }
    public function whyChooseUs ()
    {
        $page_title = 'Why Choose Us';
		$chooseus = WhyChooseUs::where('status',1)->get();
        return view('website.why-choose-us' , compact('chooseus','page_title'));
    }

    public function lostPassword()
    {
        return view('website.lost-password');
    }
    
    public function shippingAddress()
    {
        $shipping = ShippingAddress::where('customer_id', Auth::user()->id)->first();
        return view('website.shipping-address', compact('shipping'));
    }
    
    public function termsAndConditions()
    {
        return view('website.terms-and-conditions');
    }
   
    
    public function orderDetail($id)
    {
        $orders = Order::where('customer_id', Auth::user()->id)->where('id',$id)->orderby('id','desc')->first();
        $address = BillingAddress::where('customer_id', Auth::user()->id)->where('id',$orders->billing_address_id)->orderby('id','desc')->first();
        return view('website.order-details', compact('orders','address'));
    }

    public function getProductId(){
        $product_ids = Product::where('status',1)->get(['id', 'draw_ends']);
        return response()->json($product_ids);
    }
    
    public function shareEmail(Request $request){
        
        $slug= $request->product_email_slug;
        $first_name= $request->first_name;
        $last_name= $request->last_name;
        $email= $request->your_email;
        $to_email= $request->to_email;
        $product = Product::where('slug', $slug)->first();
        $details = [
            'from' => 'share-email',
            'first_name' => $first_name,
            'last_name' => $last_name,
            'from-email' => $email,
            'to_email' => $to_email,
            'product_slug' => $slug,
            'product_image' => $product->image,
        ];

        \Mail::to($to_email)->send(new \App\Mail\Email($details));
        
        return redirect()->back()->with('share-email-success', 'Email sent successfully to your friend.');
    }

    public function getSizesPrice($id)
    {
        $sizesprice = Variations::where('id', $id)->first('price');
        return array('sizesprice'=>$sizesprice);
    }

    public function loadMoreProducts(Request $request)
    {
        $page = $request->get('page', 1);
        $perPage = 3; // Load 3 products at a time
        $skip = ($page - 1) * $perPage;

        $products = Product::where('status', 1)
            ->orderBy('id', 'ASC')
            ->skip($skip)
            ->take($perPage)
            ->get()
            ->map(function($product) {
                // Format price based on product type
                if ($product->product_type == 0) {
                    // Simple product
                    $product->formatted_price = '$' . number_format($product->product_price, 2);
                } else {
                    // Variable product - get prices from variations
                    $variations = json_decode($product->variations, true);
                    if ($variations && count($variations) > 0) {
                        $prices = array_column($variations, 'price');
                        $minPrice = min($prices);
                        $maxPrice = max($prices);
                        $product->formatted_price = '$' . number_format($minPrice, 2) . ' – $' . number_format($maxPrice, 2);
                    } else {
                        $product->formatted_price = 'N/A';
                    }
                }
                return $product;
            });

        return response()->json([
            'products' => $products
        ]);
    }

    public function loadMoreCategoryProducts(Request $request, $categoryId)
    {
        $page = $request->get('page', 1);
        $perPage = 3; // Load 3 products at a time
        $skip = ($page - 1) * $perPage;

        $products = Product::where('status', 1)
            ->where('category_id', $categoryId)
            ->orderBy('id', 'ASC')
            ->skip($skip)
            ->take($perPage)
            ->get()
            ->map(function($product) {
                // Format price based on product type
                if ($product->product_type == 0) {
                    // Simple product
                    $product->formatted_price = '$' . number_format($product->product_price, 2);
                } else {
                    // Variable product - get prices from variations
                    $variations = json_decode($product->variations, true);
                    if ($variations && count($variations) > 0) {
                        $prices = array_column($variations, 'price');
                        $minPrice = min($prices);
                        $maxPrice = max($prices);
                        $product->formatted_price = '$' . number_format($minPrice, 2) . ' – $' . number_format($maxPrice, 2);
                    } else {
                        $product->formatted_price = 'N/A';
                    }
                }
                return $product;
            });

        return response()->json([
            'products' => $products
        ]);
    }

    public function send_inquiry(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:500',
        ]);

        // Send email
         $details = [
            'from'          => 'user-inquiry',
            'title'         => $data['title'].' '.$data['name'].',',
            'body'          => (object) $data
        ];

        \Mail::to('cruise@neverforgetappreciation.com')->send(new \App\Mail\Email($details));

        return back()->with('success', 'Your inquiry has been sent successfully!');
    }
}
