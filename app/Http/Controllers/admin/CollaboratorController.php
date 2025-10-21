<?php

namespace App\Http\Controllers\admin;

use App\Models\Collaborator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:collaborator-list|collaborator-create|collaborator-edit|collaborator-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:collaborator-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:collaborator-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:collaborator-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Collaborator::orderby('id', 'desc')->where('id', '>', 0);
            if ($request['search'] != "") {
                $query->where('title', 'like', '%' . $request['search'] . '%');
            }
            if ($request['status'] != "All") {
                if ($request['status'] == 2) {
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.collaborators.search', compact('models'));
        }
        $page_title = 'All Collaborators';
        $models = Collaborator::orderby('id', 'desc')->paginate(10);
        return view('admin.collaborators.index', compact("models", "page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Collaborator';
        return view('admin.collaborators.create', compact('page_title'));
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
            'title' => 'required|max:100',
            'image' => 'mimes:jpeg,jpg,png,gif,webp,svg',
        ]);

        $model = new Collaborator();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/collaborators'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->save();

        return redirect()->route('collaborator.index')->with('message', 'Collaborator Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function show(Collaborator $collaborator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Collaborator';
        $model = Collaborator::where('id', $id)->first();
        return view('admin.collaborators.edit', compact('model','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'title' => 'required|max:100',
            'image' => 'mimes:jpeg,jpg,png,gif,webp,svg',
        ]);

        $update = Collaborator::where('id', $id)->first();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/collaborators'), $photo);
            $update->image = $photo;
        }

        $update->title = $request->title;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('collaborator.index')->with('message', 'Collaborator Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Collaborator::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
