<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Blog;
use App\Models\User;
use App\Models\Categorie;
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
        if (Cookie::get('cart') == false) {           
           $time=60*24*14;
           $value = time().rand('00','99'); 
           Cookie::queue('cart', $value, $time); 
        }
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
        $category = Categorie::where('status',1)->get();
        $this->change_user();
        return view('blog-single',compact('blog','category'));
    }



 

    public function shop()
    {
        $user_id =0;
        $cart = array();
        if(Auth::user()){
            if (Cookie::get('cart')) {
               $user_id = Cookie::get('cart');
               $auth_user = Auth::user()->id;
               $cart =  Cart::where('user_id',$user_id)->update(array('user_id'=>$auth_user));
            }
            
           $user_id = Auth::user()->id;
        }else{
           $user_id = Cookie::get('cart');

        }
        $cart =  Cart::with('products')->where('user_id',$user_id)->get();
        $product = Product::where('status',1);
        if(isset($_GET['search'])){
            if ($_GET['search'] != '') {
            $product = $product->where('title', "like", "%" . $_GET['search'] . "%");
            $product = $product->orWhere('s_description', "like", "%" . $_GET['search'] . "%");
            }
        }

        if(isset($_GET['category'])){
            if ($_GET['category'] != '') {
               $product = $product->where('category_id',$_GET['category']);
            }
        }

        if(isset($_GET['min'])){
            if ($_GET['min'] != '' && $_GET['max'] != '' ) {
                
                $product = $product->where('price', ">=", $_GET['min']);

                $product = $product->where('price', "<=",$_GET['max']);
            }
        }

        if(isset($_GET['sort'])){
            if ($_GET['sort'] == 'price-asc') {

            $product = $product->orderBy('price','ASC');
            }elseif ($_GET['sort'] == 'price-desc'){
            $product = $product->orderBy('price','DESC');
            }else{

            $product = $product->orderBy('id','DESC');
            }
        }else{

            $product = $product->orderBy('id','DESC');
           
        }
        $product = $product->get();
        $this->change_user();
        return view('shop',compact('product','cart'));
    }

   public function product($id)
    {

        $user_id =0;
        $cart = array();
        if(Auth::user()){
            if (Cookie::get('cart')) {
               $user_id = Cookie::get('cart');
               $auth_user = Auth::user()->id;
               $cart =  Cart::where('user_id',$user_id)->update(array('user_id'=>$auth_user));
            }
            
           $user_id = Auth::user()->id;
        }else{
           $user_id = Cookie::get('cart');

        }
        $cart =  Cart::with('products')->where('user_id',$user_id)->get();

        $pro = Product::with('category')->where('id',$id)->first();  
        $product = Product::where('status',1)->get();
               
        $this->change_user();  
        return view('shop-single',compact('pro','product','cart'));
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
