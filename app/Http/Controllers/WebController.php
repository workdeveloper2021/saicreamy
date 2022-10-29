<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Blog;
use App\Models\User;
use App\Models\Otherimage;
use Auth;
use DB;
use Cookie;
class WebController extends Controller
{
   
    public function index()
    {
        if(Auth::user()){
         $role = Auth::user()->type;
         if($role == 'admin'){
         
             return view('admin.dashboard');
         }        
            
        } 
           $this->change_user();
           return view('index');
    }
         
    public function change_user(){
        if(Auth::user()){
          if (Cookie::get('cart')) {
               $user_id = Cookie::get('cart');
               $auth_user = Auth::user()->id;
               $cart =  Cart::where('user_id',$user_id)->update(array('user_id'=>$auth_user));
            }
        }
    }
    public function about()
    {
        $this->change_user();
        return view('about-us');
    }


    public function blog()
    { 
        $blog = Blog::where('status',1)->get();
        $this->change_user();
        return view('blog',compact('blog'));
    }


    public function blogDetails($id)
    {
        $blog = Blog::where('id',$id)->first();
        $this->change_user();
        return view('blog-single',compact('blog'));
    }



 

    public function shop()
    {
        $product = Product::where('status',1)->get();
        $this->change_user();
        return view('shop',compact('product'));
    }

   public function product($id)
    {
        $pro = Product::with('category')->where('id',$id)->first();  
        $product = Product::where('status',1)->get();
               
        $this->change_user();  
        return view('shop-single',compact('pro','product'));
    }


    public function dashboard(){
       $user = User::where('id',Auth::user()->id)->first();
        return view('dashboard',compact('user'));
    }


    public function shipping()
    {
        return view('shipping');
    }

    public function faq()
    {
        return view('faq');
    }

    public function terms()
    {
        return view('term-conditions');
    }

    public function contact()
    {
        return view('contact');
    }

    public function statelist(Request $request) {

        $input = $request->all();
        $states = DB::table('states')->where('country_id', $input['country_id'])->get()->toArray();
        if (count($states)) {
            $message = 'Success';
            return Response()->json($states);
        }
    }

    // public function citylist(Request $request) {

    //     $input = $request->all();
    //     $city = Cities::where('state_id', $input['state_id'])->get()->toArray();
    //     if (count($city)) {
    //         $message = 'Success';
    //         return Response()->json($city);
    //     } else {
    //         $message = 'Data not found';
    //         return Response()->json($city);
    //     }
    // }
}
