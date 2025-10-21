<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sizes;
use App\Models\Variations;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Str;
use App\Models\SubCategory;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Product::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.product.search', compact('models'));
        }
        $page_title = 'All Products';

        $models = Product::orderby('id', 'desc')->paginate(10);
        return view('admin.product.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Product';
        $relateds = Product::orderby('id', 'desc')->where('status', 1)->get(); 
        $variations = Variations::orderby('id', 'ASC')->where('status', 1)->get();
        $categories = Category::orderby('id', 'ASC')->where('parent_id', '0')->where('status', 1)->get();
        return view('admin.product.create', compact('page_title','categories','relateds' , 'variations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $rules = ([
            'name' => ['required', 'unique:products', 'max:255'],
            'category_id' => ['required'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['mimes:jpeg,jpg,png,gif,webp', 'max:10000'],
        ]);

        $this->validate($request, $rules);

        $model = new Product();

        // Handle product images
        if (isset($request->images) && count($request->file('images')) > 0) {
            // Store the first image as the main image
            $mainImage = $request->file('images')[0];
            $photo = date('YmdHis') . '_' . uniqid() . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->move(public_path('/admin/assets/images/product'), $photo);
            $model->image = $photo;
            
            // Store additional images as related_images if there are more than one
            if (count($request->file('images')) > 1) {
                $relatedImages = [];
                for ($i = 1; $i < count($request->file('images')); $i++) {
                    $image = $request->file('images')[$i];
                    $relatedPhoto = date('YmdHis') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/admin/assets/images/product'), $relatedPhoto);
                    $relatedImages[] = $relatedPhoto;
                }
                $model->related_images = json_encode($relatedImages);
            }
        }

        $related_product = json_encode($request->related_product);
        if ($related_product == 'null') {
            $related_product = null;
        }

        $model->created_by = Auth::user()->id;
        $model->category_id = $request->category_id;
        $model->name = $request->name;
        $model->slug = Str::slug($request->name);
        $model->product_type = $request->product_type;
        $model->is_special = $request->is_special ?? 0;
        $model->short_description = $request->short_description;
        $model->description = $request->description;
        $model->related_product = $related_product;
        $model->status = 1;

        // Handle prices and variations based on product type
        if ($request->product_type == 1) { // Variable Product
            // Store price range as JSON array in variation_price
            $model->variation_price = json_encode([
                'from' => $request->from_price,
                'to' => $request->to_price
            ]);
            
            // Store all variations as JSON
            $variations = [];
            if (isset($request->variation_id) && is_array($request->variation_id)) {
                $variationIds = $request->variation_id;
                $variationPrices = $request->variation_price;
                $variationImages = $request->file('variation_image');

                foreach ($variationIds as $key => $variationId) {
                    if ($variationId != 0) {
                        $variation = [
                            'variation_id' => $variationId,
                            'price' => $variationPrices[$key] ?? 0,
                            'image' => null
                        ];

                        // Handle variation image
                        if (isset($variationImages[$key]) && $variationImages[$key]) {
                            $image = $variationImages[$key];
                            $photo = date('YmdHis') . '_var_' . uniqid() . '.' . $image->getClientOriginalExtension();
                            $image->move(public_path('/admin/assets/images/product/variations'), $photo);
                            $variation['image'] = $photo;
                        }

                        $variations[] = $variation;
                    }
                }
            }
            $model->variations = json_encode($variations);
        } else { // Simple Product
            $model->product_price = $request->product_price;
            $model->variation_price = null;
            $model->variations = null;
        }

        $model->save();
        return redirect()->route('product.index')->with('message', 'Product Added Successfully !');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $details = Product::where('slug', $slug)->first();
        if (!$details) {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }
        
        $page_title = 'Show Product';
        return view('admin.product.show', compact('details', 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $details = Product::where('slug', $slug)->first();
        if (!$details) {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }
        
        $product_variations = [];
        if ($details->variations) {
            $product_variations = json_decode($details->variations, true);
        }
        $page_title = 'Edit Product';
        $relateds = Product::orderby('id', 'desc')->where('status', 1)->get(); 
        $categories = Category::where('status', 1)->get(); 
        $variations = Variations::where('status', 1)->get();
        return view('admin.product.edit', compact('details', 'product_variations', 'relateds', 'page_title', 'categories', 'variations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $slug)
    {
        $update = Product::where('slug', $slug)->first();
        if (!$update) {
            return redirect()->back()->with('error', 'Product not found');
        }
        
        // Handle removed images
        if ($request->removed_images && is_array($request->removed_images)) {
            foreach ($request->removed_images as $image) {
                // Remove from main image if it matches
                if ($update->image == $image) {
                    if (file_exists(public_path('/admin/assets/images/product/' . $image))) {
                        unlink(public_path('/admin/assets/images/product/' . $image));
                    }
                    $update->image = null;
                }
                
                // Remove from related images if it matches
                if ($update->related_images) {
                    $relatedImages = json_decode($update->related_images, true);
                    if (($key = array_search($image, $relatedImages)) !== false) {
                        if (file_exists(public_path('/admin/assets/images/product/' . $image))) {
                            unlink(public_path('/admin/assets/images/product/' . $image));
                        }
                        unset($relatedImages[$key]);
                        $update->related_images = !empty($relatedImages) ? json_encode(array_values($relatedImages)) : null;
                    }
                }
            }
        }
        
        // Handle new product images
        if (isset($request->images) && count($request->file('images')) > 0) {
            // Store the first image as the main image if no main image exists
            if (!$update->image) {
                $mainImage = $request->file('images')[0];
                $photo = date('YmdHis') . '_' . uniqid() . '.' . $mainImage->getClientOriginalExtension();
                $mainImage->move(public_path('/admin/assets/images/product'), $photo);
                $update->image = $photo;
                
                // Store additional images as related_images if there are more than one
                if (count($request->file('images')) > 1) {
                    $relatedImages = [];
                    for ($i = 1; $i < count($request->file('images')); $i++) {
                        $image = $request->file('images')[$i];
                        $relatedPhoto = date('YmdHis') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/admin/assets/images/product'), $relatedPhoto);
                        $relatedImages[] = $relatedPhoto;
                    }
                    $update->related_images = json_encode($relatedImages);
                }
            } else {
                // If main image exists, add all new images to related_images
                $relatedImages = $update->related_images ? json_decode($update->related_images, true) : [];
                foreach ($request->file('images') as $image) {
                    $relatedPhoto = date('YmdHis') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/admin/assets/images/product'), $relatedPhoto);
                    $relatedImages[] = $relatedPhoto;
                }
                $update->related_images = json_encode($relatedImages);
            }
        }

        $related_product = json_encode($request->related_product);
        if ($related_product == 'null') {
            $related_product = null;
        }

        $update->category_id = $request->category_id;
        $update->name = $request->name;
        $update->slug = Str::slug($request->name);
        $update->product_type = $request->product_type;
        $update->is_special = $request->is_special ?? 0;
        $update->short_description = $request->short_description;
        $update->description = $request->description;
        $update->related_product = $related_product;
        $update->status = $request->status;

        // Handle prices and variations based on product type
        if ($request->product_type == 1) { // Variable Product
            // Store price range as JSON array in variation_price
            $update->variation_price = json_encode([
                'from' => $request->from_price,
                'to' => $request->to_price
            ]);
            
            // Store all variations as JSON
            $variations = [];
            if (isset($request->variation_id) && is_array($request->variation_id)) {
                $variationIds = $request->variation_id;
                $variationPrices = $request->variation_price;
                $variationImages = $request->file('variation_image');
                
                // Get existing variations to preserve images
                $existingVariations = json_decode($update->variations, true) ?? [];

                foreach ($variationIds as $key => $variationId) {
                    if ($variationId != 0) {
                        $variation = [
                            'variation_id' => $variationId,
                            'price' => $variationPrices[$key] ?? 0,
                            'image' => null
                        ];

                        // Check if there's a new image for this variation
                        if (isset($variationImages[$key]) && $variationImages[$key]) {
                            $image = $variationImages[$key];
                            $photo = date('YmdHis') . '_var_' . uniqid() . '.' . $image->getClientOriginalExtension();
                            $image->move(public_path('/admin/assets/images/product/variations'), $photo);
                            $variation['image'] = $photo;
                        } else {
                            // If no new image, try to find existing image for this variation
                            foreach ($existingVariations as $existingVar) {
                                if ($existingVar['variation_id'] == $variationId) {
                                    $variation['image'] = $existingVar['image'];
                                    break;
                                }
                            }
                        }

                        $variations[] = $variation;
                    }
                }
            }
            $update->variations = json_encode($variations);
        } else { // Simple Product
            $update->product_price = $request->product_price;
            $update->variation_price = null;
            $update->variations = null;
        }

        $update->save();
        return redirect()->route('product.index')->with('message', 'Product Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $Product = Product::where('slug', $slug)->first();
        if ($Product) {
            $Product->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
