<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CareerCategory;
use Illuminate\Http\Request;
use Auth;

class CareerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct()
    {
        $this->middleware('permission:career_category-list|career_category-create|career_category-edit|career_category-delete', ['only' => ['index','store']]);
        $this->middleware('permission:career_category-create', ['only' => ['create','store']]);
        $this->middleware('permission:career_category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:career_category-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = CareerCategory::orderby('id', 'ASC')->where('id', '>', 0);
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
            return (string) view('admin.career_category.search', compact('models'));
        }
        $page_title = 'All Career Categories';
        $page_title_add = 'Add Career Category';
        $models = CareerCategory::orderby('id', 'ASC')->paginate(10);
        return view('admin.career_category.index', compact("models","page_title","page_title_add"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Career Category';
        $categories = CareerCategory::orderby('id', 'desc')->where('status', 1)->get();
        return view('admin.career_category.create', compact('page_title','categories'));
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

        $model = new CareerCategory();

        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->save();

        return redirect()->route('career_category.index')->with('message', 'Career Category Added Successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CareerCategory  $careerCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CareerCategory $careerCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CareerCategory  $careerCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Career Category';
        $model = CareerCategory::where('id', $id)->first();
        $categories = CareerCategory::orderby('id', 'desc')->where('status', 1)->get();
        return view('admin.career_category.edit', compact("model", "page_title",'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CareerCategory  $careerCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title' => 'required|max:100',
        ]);

        $update = CareerCategory::where('id', $id)->first();
        $update->title = $request->title;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('career_category.index')->with('message', 'Career Category Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CareerCategory  $careerCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CareerCategory::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
