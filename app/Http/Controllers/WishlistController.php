<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Wishlist::with('product')->orderby('id', 'desc');

        // If the user is not an admin, filter by their orders
        if (!$user->hasRole('Admin')) {
            $query->where('user_id', $user->id);
        }

        if ($request->ajax()) {
            if ($request['search'] != "") {
                $query->where('product_id', 'like', '%' . $request['search'] . '%');
            }
            if ($request['status'] != "All") {
                if ($request['status'] == 2) {
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $wishlists = $query->paginate(10);
            return (string) view('admin.wishlist.search', compact('wishlists'));
        }

        $wishlists = Wishlist::with('product')->paginate(10);
        $page_title = 'Wishlist';
        return view('admin.wishlist.index', compact("wishlists", "page_title"));
    }

    public function toggle(Request $request)
    {
        $user = auth()->user();

        $wishlist = Wishlist::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($wishlist) {
            $wishlist->delete();

            return response()->json([
                'status' => 'removed'
            ]);
        }

        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id
        ]);

        return response()->json([
            'status' => 'added'
        ]);
    }
}
