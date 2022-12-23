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
use Razorpay\Api\Api;
use Session;
use Exception;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

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
        $order = Order::where('id',$id)->first();
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

            ->editColumn('status', function($row) {
                return '<a class="changestatus" href="javascript:void(0);" id="'.$row->id.'" status="'.$row->status.'">'.$row->status.'</a>';
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
         $input['state'] = DB::table('states')->where('id',$input['state'])->value('name');
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
        
           $request->session()->put('giftcode',  '');
           $request->session()->put('discount',  0);
         $order = Order::with('user')->with('order_products')->where('id',$order->id)->first();
       
         \Mail::to($input['email'])->send(new \App\Mail\MyTestMail($order));

      
         return redirect('thanks')->with('success', 'Congratulation your order has been successfully placed! ');
       
    }


    public function orderstatus(Request $request){

        $order = Order::where('id',$request->order_id)->update(array('status'=> $request->status));
        return redirect()->back()->with('success', 'status change successfully! ');
    }

   

   
}