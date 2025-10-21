<?php

namespace App\Http\Controllers\admin;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class TestimonialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index','store']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Testimonial::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $testimonials = $query->paginate(10);
            return (string) view('admin.testimonial.search', compact('testimonials'));
        }
        $page_title = 'All Testimonials';
        $testimonials = Testimonial::orderby('id', 'desc')->paginate(10);
        return view('admin.testimonial.index', compact("testimonials", "page_title"));
    }

    public function create()
    {
        $page_title = 'Add Testionial';
        return view('admin.testimonial.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        // Validate based on media type
        if ($request->media_type === 'image') {
            $validator = $request->validate([
                'name' => 'required',
                'comment' => 'required',
                'media_type' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif,webp|max:10000' // max 10000kb
            ]);
        } elseif ($request->media_type === 'video') {
            $validator = $request->validate([
                'name' => 'required',
                'comment' => 'required',
                'media_type' => 'required',
                'video' => 'required|mimes:mp4,avi,mov,wmv,flv,webm|max:50000' // max 50MB for videos
            ]);
        } else {
            return redirect()->back()->withErrors(['media_type' => 'Please select either Image or Video'])->withInput();
        }

        $testimonail = new Testimonial();

        // Handle image upload
        if ($request->media_type === 'image' && isset($request->image)) {
            $photo = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/testimonials'), $photo);
            $testimonail->image = $photo;
            $testimonail->video = null; // Ensure video is null when storing image
        }

        // Handle video upload
        if ($request->media_type === 'video' && isset($request->video)) {
            $video = date('d-m-Y-His').'.'.$request->file('video')->getClientOriginalExtension();
            $request->video->move(public_path('/admin/assets/images/testimonials'), $video);
            $testimonail->video = $video;
            $testimonail->image = null; // Ensure image is null when storing video
        }

        $testimonail->name = $request->name;
        $testimonail->slug = \Str::slug($request->name);
        $testimonail->designation = $request->designation;
        $testimonail->rating = $request->rating;
        $testimonail->comment = $request->comment;
        $testimonail->save();

        return redirect()->route('testimonial.index')->with('message', 'Testimonial Added Successfully !');
    }

    public function edit($slug)
    {
        $page_title = 'Edit Testimonial';
        $testimonial = Testimonial::where('slug', $slug)->first();
        return view('admin.testimonial.edit', compact("testimonial", "page_title"));
    }

    public function update(Request $request, $slug)
    {
        $update = Testimonial::where('slug', $slug)->first();
        
        // Validate based on media type
        if ($request->media_type === 'image') {
            $validator = $request->validate([
                'name' => 'required',
                'comment' => 'required',
                'media_type' => 'required',
                'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000' // nullable for updates
            ]);
        } elseif ($request->media_type === 'video') {
            $validator = $request->validate([
                'name' => 'required',
                'comment' => 'required',
                'media_type' => 'required',
                'video' => 'nullable|mimes:mp4,avi,mov,wmv,flv,webm|max:50000' // nullable for updates
            ]);
        } else {
            return redirect()->back()->withErrors(['media_type' => 'Please select either Image or Video'])->withInput();
        }

        // Handle image upload
        if ($request->media_type === 'image' && isset($request->image)) {
            $photo = date('d-m-Y-His').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/testimonials'), $photo);
            $update->image = $photo;
            $update->video = null; // Clear video when updating with image
        }

        // Handle video upload
        if ($request->media_type === 'video' && isset($request->video)) {
            $video = date('d-m-Y-His').'.'.$request->file('video')->getClientOriginalExtension();
            $request->video->move(public_path('/admin/assets/images/testimonials'), $video);
            $update->video = $video;
            $update->image = null; // Clear image when updating with video
        }

        $update->name = $request->name;
        $update->slug = \Str::slug($request->name);
        $update->designation = $request->designation;
        $update->rating = $request->rating;
        $update->comment = $request->comment;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('testimonial.index')->with('message', 'Testimonial Updated Successfully !');
    }

    public function destroy($slug)
    {
        $testimonial = Testimonial::where('slug', $slug)->first();
        if ($testimonial) {
            $testimonial->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
