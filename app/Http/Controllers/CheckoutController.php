<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Otherimage;
use App\Models\Font;
use Illuminate\Http\Request;
use DB;
use Cookie;
use Auth;
use FORM;
use URL;
class CheckoutController extends Controller
{
    
    public function index(Request $request)
    {   
        $user_id =0;
        $cart = array();
        if(Auth::user()){
           $user_id = Auth::user()->id;
            if (Cookie::get('cart')) {
               $auth_user = Cookie::get('cart');
               $user_id = Auth::user()->id;
               $cart =  Cart::where('user_id',$auth_user)->update(array('user_id'=>$user_id));
            }
        }else{
           $user_id = Cookie::get('cart');
        }
        $cart =  Cart::with('products')->where('user_id',$user_id)->get();
        $states = DB::table('states')->get();
        return view('checkout',compact('states','cart'));
    }

}