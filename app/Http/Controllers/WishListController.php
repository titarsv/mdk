<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class WishListController extends Controller
{

    public function index()
    {
        $wish_list = Wishlist::all();
        return view('admin.wishlist.index')->with('wish_list', $wish_list);
    }

    public function update(Request $request)
    {
        $user = Sentinel::check();

        if($user) {
            $user_id = $user->id;
            $product_id = (int)$request->product_id;
            $action = $request->action;

            if($action == 'add'){
                $to_wishlist = ['user_id' => $user_id, 'product_id' => $product_id];
                Wishlist::create($to_wishlist)->save();
                $wishlist = Wishlist::where('user_id', $user_id)->count();
                return response()->json(['count' => $wishlist]);
            }
            if($action == 'remove'){
                Wishlist::where('user_id',$user_id)->where('product_id',$product_id)->delete();
                $wishlist = Wishlist::where('user_id', $user_id)->count();
                return response()->json(['count' => $wishlist]);
            }
        }else{
            return response()->json(['error' => 'login']);
        }
    }
}
