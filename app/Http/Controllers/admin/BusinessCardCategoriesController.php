<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCardCategories;
use Illuminate\Http\Request;
use Auth;

class BusinessCardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:business_card_categories-list|business_card_categories-create|business_card_categories-edit|business_card_categories-delete', ['only' => ['index','store']]);
        $this->middleware('permission:business_card_categories-create', ['only' => ['create','store']]);
        $this->middleware('permission:business_card_categories-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:business_card_categories-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query = BusinessCardCategories::orderby('id', 'ASC')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.business_card_category.search', compact('models'));
        }
        $page_title = 'All Business Card Categories';
        $models = BusinessCardCategories::orderby('id', 'ASC')->paginate(10);
        return view('admin.business_card_category.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Business Card Category';
        $categories = BusinessCardCategories::orderby('id', 'desc')->where('status', 1)->get();
        return view('admin.business_card_category.create', compact('page_title','categories'));
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
            'title' => 'required',
        ]);

        $model = new BusinessCardCategories();
		
		if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/business_card_categories'), $photo);
            $model->image = $photo;
        }
		$parent_id = $request->parent_id;
        if($parent_id == 0){
            $parent_id = 0;
        }

        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->parent_id = $parent_id; 
        $model->save();

        return redirect()->route('business_card_categories.index')->with('message', 'Business Card Category Added Successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessCardCategories  $businessCardCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCardCategories $businessCardCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessCardCategories  $businessCardCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Business Card Category';
        $model = BusinessCardCategories::where('id', $id)->first();
        $categories = BusinessCardCategories::orderby('id', 'desc')->where('status', 1)->get();
        return view('admin.business_card_category.edit', compact("model", "page_title",'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessCardCategories  $businessCardCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title' => 'required|max:100',
        ]);

        $update = BusinessCardCategories::where('id', $id)->first();
		
		if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/business_card_categories'), $photo);
            $update->image = $photo;
        }
		$parent_id = $request->parent_id;
        if($parent_id == 0){
            $parent_id = 0;
        }

        $update->title = $request->title; 
        $update->parent_id = $parent_id;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('business_card_categories.index')->with('message', 'Business Card Category Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
    * @param  \App\Models\BusinessCardCategories  $businessCardCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = BusinessCardCategories::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
