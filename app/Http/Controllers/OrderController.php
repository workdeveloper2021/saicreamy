<?php
  
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Otherimage;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Font;
use Illuminate\Http\Request;
use DB;
use Cookie;
use Auth;
use FORM;
use URL;
class OrderController extends Controller
{
   
    public function index(Request $request)
    {   
        $user_id =0;
        $cart = array();
        if(Auth::user()){
           $user_id = Auth::user()->id;
        }else{
           $user_id = Cookie::get('cart');
        }
         $cart =  Cart::with('products')->where('user_id',$user_id)->get();
        $countries = DB::table('countries')->get();
        return view('checkout',compact('countries','cart'));
    }


    public function order(Request $request)
    {
        return view('admin.order.index');
    }


    public function show($id)
    {    
        $order = Order::first();
        return view('admin.order.show',compact('order'));
    }
  

     public function orderList() {
        $industry = Order::with('user')->get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('username', function($row) {
                return $row->user->name ;
            })

            ->editColumn('useremail', function($row) {
                return $row->user->email ;
            })

        
            ->addColumn('action', function($row) {
                $btn = '';  
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('order-show', [$row->id]) . '">View</a>';
                $btn .= '</div>';
                return $btn;
            })
            ->rawColumns([
                'useremail' => 'useremail',
                'username' => 'username',
                'status' => 'status',
                'category_code' => 'category_code',
                'action' => 'action'
            ])
            ->make(true);
    }

    public function orderplace(Request $request)
    { 
         $input = $request->except(['_token']);
         $input['user_id'] = Auth::user()->id;
         $input['total'] = Cart::where(array('user_id'=>$input['user_id'],'type'=>'cart') )->sum('price');
         $order = Order::create($input);
         $cart = Cart::where(array('user_id'=>$input['user_id'],'type'=>'cart'))->get()->toArray();
         if (!empty($cart)) {
            foreach ($cart as $key => $value) {
              $value['order_id'] =$order->id;
              unset($value['type']);
              Order_product::create($value);
              Cart::where(array('user_id'=>$input['user_id'],'type'=>'cart') )->delete();
            }
         }
        
          return redirect('home')->with('success', 'your message,here');
    }

}