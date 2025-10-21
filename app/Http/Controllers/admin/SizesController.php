<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function _construct()
    {
        $this->middleware('permission:sizes-list|sizes-create|sizes-edit|sizes-delete' , ['only' => ['index','store']]);
        $this->middleware('permission:sizes-create' , ['only' => ['create','store']]);
        $this->middleware('permission:sizes-edit' , ['only' => ['edit','update']]);
        $this->middleware('permission:sizes-delete' , ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query=Sizes::orderby('id' , 'asc')->where('id' ,'>' , 0);
            if($request['search'] != ""){
                $query->where('sizes', 'like', '%'. $request['search'] .'%')
                    ->orWhere('status', 'like', '%'. $request['search'].'%');
            }
            if($request['status'] != "All"){
                if($request['status']==1){
                    $request['status']==0;
                }
                $query->where('status' ,$request['status']);
            }
            $sizes=$query->paginate(10);
            return (string) view('admin.sizes.search' , compact('sizes'));
        }

        $page_title= 'All Sizes';
        $sizes = Sizes::orderby('id' , 'asc')->paginate(10);
        return view('admin.sizes.index' , compact('sizes', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title= "Add Sizes";
        return view('admin.sizes.create' , compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'sizes' => 'required|array', 
        ]);

        $latestId = Sizes::max('ascending_id');

        foreach ($request->sizes as $size) {
            if (!empty($size)) {
                $is_size_available = Sizes::where('sizes' ,$size)->first();
                if($is_size_available == ""){
                    Sizes::create([
                        'created_by' => Auth::user()->id,
                        'ascending_id' => ++$latestId,
                        'sizes' => $size,
                    ]);
                }
            }
        }

        return redirect()->route('sizes.index')->with('message', 'Sizes successfully added!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function show(Sizes $sizes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title= "Edit Sizes";
        $sizes=Sizes::where('id' , $id)->first();
        return view('admin.sizes.edit' , compact('page_title' , 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        $request->validate([
        'sizes' => [
            'sometimes',
            'string',
            Rule::unique('sizes', 'sizes')->ignore($id),
        ],
            
        ], [
            'sizes.unique' => 'This size is already exist.',
        ]);
    
        $update = Sizes::where('id', $id)->first();
    
        if ($request->has('sizes')) {
            $update->sizes = $request->sizes;
        }
        
        $update->status = $request->status;
        $update->update();
    
        return redirect()->route('sizes.index')->with('message', 'Sizes Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sizes  $sizes
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $sizes = Sizes::where('id', $id)->first();

        if ($sizes) {
            $deletedAscendingId = $sizes->ascending_id;

            try {
                DB::beginTransaction();

                $sizes->delete();

                Sizes::where('ascending_id', '>', $deletedAscendingId)->decrement('ascending_id');

                DB::commit();

                return response()->json(['message' => 'Size deleted successfully']);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Deletion failed: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'Size not found'], 404);
        }
    }















    /* public function destroy($id)
    {
        $sizes=Sizes::where('id' , $id)->first();
        if($sizes){
            $deletedAscendingId = $sizes->ascending_id;
            DB::beginTransaction();
            $sizes->delete();
            Sizes::where('ascending_id', '>', $deletedAscendingId)->decrement('ascending_id');
            return true;
        }
        else{
            return response()->json(['message' => 'Failed'], 404);
        }
    } */
}
