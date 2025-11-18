<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Variations;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Variable;

class VariationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct()
    {
        $this->middleware('permission:variations-list|variations-create|variations-edit|variations-delete', ['only' => ['index','store']]);
        $this->middleware('permission:variations-create', ['only' => ['create','store']]);
        $this->middleware('permission:variations-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:variations-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Variations::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $variations = $query->paginate(10);
            return (string) view('admin.variations.search', compact('variations'));
        }
        $page_title = 'All Variations';
        $variations = Variations::orderby('id', 'desc')->paginate(10);
        return view('admin.variations.index', compact("variations", "page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $page_title = 'Add Variations';
        $product = Product::where('slug',$request->slug)->first();
        $categories = Category::orderby('id', 'ASC')->where('status', 1)->get();
        return view('admin.variations.create', compact('page_title','categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|unique:variations,name',
        ], [
            'name.unique' => 'This variation already exists.',
        ]);

        $model = new Variations();
        $model->created_by = Auth::user()->id;
        $model->name = $request->name;
        $model->save();

        return redirect()->route('variations.index')->with('message', 'Variation Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Variations  $variations
     * @return \Illuminate\Http\Response
     */


    public function show(Request $request, $slug)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Variations  $variations
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request, $id)
    {
        $variations = Variations::where('id', $id)->first();
        $page_title = 'Edit Variations';
        $product = Product::where('id',$variations->product_id)->first();
        $categories = Category::orderby('id', 'ASC')->where('status', 1)->get();
        return view('admin.variations.edit', compact("page_title","categories","product","variations"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variations  $variations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Variations::where('id', $id)->first();
        $validator = $request->validate([
            'name' => 'required|unique:variations,name,'.$id,
        ], [
            'name.unique' => 'This variation already exists.',
        ]);

        $update->created_by = Auth::user()->id;
        $update->name = $request->name;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('variations.index')->with('message', 'Variations Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variations  $variations
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
    {
        $model = Variations::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
