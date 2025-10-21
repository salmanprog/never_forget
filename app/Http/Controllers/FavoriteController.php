<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use Auth;
use Hash;
use DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function favoriteList()
    {
        if(Auth::check()){
            return redirect('dashboard')->with('favorite-list', 'View your favorite products');
        }else{
            return redirect('login')->with('login-first', 'Sorry, you must be logged in!');
        }
    }
    public function addToFavorite($slug)
    {
        if(!Auth::check()){
            return redirect('login')->with('login-first', 'Sorry, you must be logged in!');
        }
        $user_id = Auth::id();
        $product = Product::where('slug', $slug)->first();
        $favorite = Favorite::where('user_id', $user_id)->where('product_slug', $slug)->first();
        if($favorite ==""){
            $favorite = Favorite::create([
                'user_id' => $user_id,
                'product_slug' => $slug,
            ]);
        }
        return redirect()->back()->with('favorite-added-success', $product->name .' have been added to your favorite list');
    }
    
    public function removeFavorite($slug)
    {
        if(!Auth::check()){
            return redirect('login')->with('login-first', 'Sorry, you must be logged in!');
        }
        $user_id = Auth::id();
        $product = Product::where('slug', $slug)->first();
        $model = Favorite::where('user_id', $user_id)->where('product_slug', $slug)->first();
        if ($model) {
            $model->delete();
             return redirect()->back()->with('favorite-added-success', $product->name .' remove from your favorite list');
        }
        
    }
}
