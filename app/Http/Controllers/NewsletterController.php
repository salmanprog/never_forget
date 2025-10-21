<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    /* public function index(Request $request)
    {
        $categories = Category::where('status', 1)->get(['slug']);
        $data = [];
        foreach($categories as $category){
            $data[$category->slug] = Product::where('category_slug', $category->slug)->where('status',1)->get();
        }
        return view('website.index', compact('data'));
    } */

    public function index(Request $request)
    {
        if($request->ajax()){
            
            $query = Newsletter::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('email', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            // return "Asjad";
            $news_letters = $query->paginate(10);
            return (string) view('admin.news_letter.search', compact('news_letters'));
        }
        $page_title = 'All Subscribers';
        $news_letters = Newsletter::orderby('id', 'desc')->paginate(10);
        return View('admin.news_letter.index', compact("news_letters","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {

            // $validator = $request->validate([
            //     'email' => 'required|max:100',
            // ]);
        
            $model = new Newsletter();
            $model->email = $request->email;
            $model->save();
            return redirect()->back()->with('message', 'Email send Successfully !');
        }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Subscribers';
        $news_letters  = Newsletter::where('id', $id)->first();
        return View('admin.news_letter.edit', compact('news_letters','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
           
        ]);

        $update = Newsletter::where('id', $id)->first();

       
        
        $update->status = $request->status;
        $update->update();

        return redirect()->route('newsletter.index')->with('message', 'Subscribers Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Newsletter::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}

