<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Otherimage;
use App\Models\Font;
use Illuminate\Http\Request;

use Cookie;
use Auth;
use FORM;
use URL;
use DB;
class CartController extends Controller
{
    
    

   
    public function index(Request $request)
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
        // return $user_id;
        $cart =  Cart::with('products')->where('user_id',$user_id)->get();
        $countries = DB::table('countries')->get();
        return view('cart',compact('countries','cart'));
    }

    public function cartList() {
        $industry = Product::where('type','print')->where('status',1)->get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
             ->editColumn('image', function($row) {
                return '<img src="'.URL::to('/').'/'.$row->image.'" style="width: 50px; height:50px;">'; })
              ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span style="color:green">Active</span>' : '<span style="color:red">In-Active</span>';
                            })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('print.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->rawColumns([
                'status' => 'status',
                'image' => 'image',
                'action' => 'action'
            ])
            ->make(true);
    }

    

    public function store(Request $request)
    {

        $input = $request->except(['_token']);
        if(Auth::user()){
           $user_id = Auth::user()->id;
        }else{
           if (Cookie::get('cart') == false) {           
           $time=60*24*14;
           $value = time().rand('00','99'); 
           Cookie::queue('cart', $value, $time); 
           }
           $user_id= Cookie::get('cart');
            
        } 
        $submit = $input['submit'];
        unset( $input['submit']);
        $input['user_id'] =$user_id;
        $product = Product::where('id',$input['product_id'])->first();
        $input['unit_price'] =$product->price;

        if(isset($input['printing_text'])){
            if ($input['printing_text'] != '') {
             $font = Font::where('name',$input['font'])->first('price');
             $text = strlen($input['printing_text'])*$product->per_character_price;-
             $input['unit_price'] =$font->price+$product->price+$text;
            }
        }

        $input['price'] =  $input['unit_price']*$input['qty'];
        $input['product_type'] = $product->type;
        if(isset($input['color'] )){

        $input['color'] = implode(',',$input['color']);
        }
        $exist = Cart::where(array('product_id'=>$input['product_id'],'user_id'=> $user_id))->count();
        if($exist > 0){
           Cart::where(array('product_id'=>$input['product_id'],'user_id'=> $user_id))->update($input);
        }else{
           Cart::create($input);
        }
        session()->flash('success', 'Added to Cart Successfully!');
        if ($submit == 'cart') {
           return redirect()->back();
        }else{
           return redirect('checkout');   
        }
    }

   
    public function show($id)
    {
        $post = Product::find($id);
   
        return view('admin.print.show', compact('post'));
    }


    public function deletecart(Request $request)
    {   
        $id = $request->id;
        Cart::where('id',$id)->delete();       
    }

    public function delete_cart($id)
    {   
        Cart::where('id',$id)->delete(); 
        return redirect()->route('cart.index');      
    }

    public function getcart(Request $request){
        $user_id =0;
        $cart = array();
        if(Auth::user()){
           $user_id = Auth::user()->id;
        }else{
           $user_id = Cookie::get('cart');
        }
        $cart =  Cart::with('products')->where('user_id',$user_id)->get();
        return view('cart-item',compact('cart'));
    }
}