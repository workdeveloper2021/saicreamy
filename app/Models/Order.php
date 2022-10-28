<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order_product;
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id', 'email',  's_fname','s_lname','s_cumpany',  'address','address2',   'address3',   'country','state',  'pincode','total',  'discount',   'coupon_id',  'transaction_id', 'status', 'payment_mode',   'payment_status', 
    ];

    public function user()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }

     public function order_products()
    {
      return $this->belongsTo(Order_product::class,'id','order_id');
    }
}