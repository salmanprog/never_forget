<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Catering;
use Illuminate\Http\Request;
use Auth;

class CateringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    function __construct()
    {
        $this->middleware('permission:catering_service-list|catering_service-create|catering_service-edit|catering_service-delete', ['only' => ['index','store']]);
        $this->middleware('permission:catering_service-create', ['only' => ['create','store']]);
        $this->middleware('permission:catering_service-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:catering_service-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Catering::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('heading', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.catering.search', compact('models'));
        }
        $page_title = 'All Catering';
        $models = Catering::orderby('id', 'desc')->paginate(10);
        return view('admin.catering.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $page_title = 'Add Catering';
        return view('admin.catering.create', compact('page_title')); 
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
            'heading' => 'required|max:100',
            'description' => 'required|max:2000',
        ]);

        $model = new Catering();

        if (isset($request->first_image)) {
            $photo = date('YmdHis').'.'.$request->file('first_image')->getClientOriginalExtension();
            $request->first_image->move(public_path('/admin/assets/images/catering'), $photo);
            $model->first_image = $photo;
        }
        
        if (isset($request->second_image)) {
            $photo = date('YmdHis').'.'.$request->file('second_image')->getClientOriginalExtension();
            $request->second_image->move(public_path('/admin/assets/images/catering'), $photo);
            $model->second_image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->first_title = $request->first_title;
        $model->second_title = $request->second_title;
        $model->heading = $request->heading;
        $model->description = $request->description;
        $model->save();

        return redirect()->route('catering_service.index')->with('message', 'Catering Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catering  $catering
     * @return \Illuminate\Http\Response
     */
    public function show(Catering $catering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catering  $catering
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Catering';
        $model = Catering::where('id', $id)->first();
        return view('admin.catering.edit', compact('model','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catering  $catering
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'heading' => 'required|max:100',
            'description' => 'required|max:2000',

        ]);

        $update = Catering::where('id', $id)->first();

        if (isset($request->first_image)) {
            $photo = date('YmdHis').'.'.$request->file('first_image')->getClientOriginalExtension();
            $request->first_image->move(public_path('/admin/assets/images/catering'), $photo);
            $update->first_image = $photo;
        }
        if (isset($request->second_image)) {
            $photo = date('YmdHis').'.'.$request->file('second_image')->getClientOriginalExtension();
            $request->second_image->move(public_path('/admin/assets/images/catering'), $photo);
            $update->second_image = $photo;
        }

        $update->first_title = $request->first_title;
        $update->second_title = $request->second_title;
        $update->heading = $request->heading;
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('catering_service.index')->with('message', 'Catering Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catering  $catering
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Catering::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
