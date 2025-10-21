<?php

namespace App\Http\Controllers\admin;

use App\Models\Career; 
use App\Models\CareerApplication;
use App\Models\CareerCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:careers-list|careers-create|careers-edit|careers-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:careers-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:careers-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:careers-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Career::orderby('id', 'desc')->where('id', '>', 0);
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
            return (string) view('admin.career.search', compact('models'));
        }
        $page_title = 'All Careers';
        $page_title_add = 'Add Career';
        $models = Career::orderby('id', 'desc')->paginate(10);
        return view('admin.career.index', compact("models", "page_title","page_title_add"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Career';
        $categories = CareerCategory::orderby('id', 'asc')->where('status', 1)->get();
        return view('admin.career.create', compact('page_title','categories'));
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

        $model = new Career();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/careers'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->career_category_id = $request->career_category_id;
        $model->title = $request->title;
        $model->description = $request->description;
        $model->save();

        return redirect()->route('careers.index')->with('message', 'Career Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Career';
        $model = Career::where('id', $id)->first();
        $categories = CareerCategory::orderby('id', 'asc')->where('status', 1)->get();
        return view('admin.career.edit', compact('model','page_title','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'title' => 'required|max:100',
            'image' => 'mimes:jpeg,jpg,png,gif,webp,svg',
        ]);

        $update = Career::where('id', $id)->first();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/careers'), $photo);
            $update->image = $photo;
        }

        $update->career_category_id = $request->career_category_id;
        $update->title = $request->title;
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('careers.index')->with('message', 'Career Updated Successfully !');
    }


    public function applyCareer(Request $request)
    {
        try {
            $request->validate([
                'career_id' => 'required|exists:careers,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'nullable|string|max:20',
                'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
                'cover_letter' => 'nullable|string',
            ]);

            $resumePath = null;
            
            // Handle file upload 
            if ($request->hasFile('resume')) {
                $photo = date('YmdHis').'.'.$request->file('resume')->getClientOriginalExtension();
                $request->resume->move(public_path('/admin/assets/images/career_application'), $photo);
                $resumePath = $photo;
            }

            CareerApplication::create([
                'career_id'    => $request->career_id,
                'name'         => $request->name,
                'email'        => $request->email,
                'phone'        => $request->phone,
                'resume'       => $resumePath,
                'cover_letter' => $request->cover_letter,
            ]);

            return back()->with('success', 'Your application has been submitted successfully! We will review your application and get back to you soon.');

        } catch (\Exception $e) {
            return back()->with('error', 'Sorry, there was an error submitting your application. Please try again or contact us directly.');
        }
    }

    public function careerApplications($id)
    {
        $career = Career::with('hasCategory')->findOrFail($id);
        $applications = CareerApplication::where('career_id', $id)->with('career')->latest()->paginate(10);
        $page_title = 'Applications for: ' . $career->title;
        return view('admin.career.career-applications', compact('applications', 'career', 'page_title'));
    }

    public function respondToApplication(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'status' => 'required|in:pending,accepted,rejected'
        ]);

        $application = CareerApplication::with('career')->findOrFail($id);
        
        // Update application status
        $application->status = $request->status === 'accepted' ? 1 : ($request->status === 'rejected' ? 0 : null);
        $application->save();

        // Send email to applicant
        $data = [
            'applicant_name' => $application->name,
            'career_title' => $application->career->title,
            'subject' => $request->subject,
            'response_message' => $request->message,
            'status' => $request->status
        ];

        Mail::send('emails.career-response', $data, function($message) use ($application, $request) {
            $message->to($application->email, $application->name)
                    ->subject($request->subject);
        });

        return back()->with('success', 'Response sent successfully to ' . $application->name . ' via email.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Career::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
