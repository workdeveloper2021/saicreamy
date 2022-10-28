<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'id', 'title','banner', 'price','font', 'size','color', 'image','minmum_character','per_character_price', 'video', 'v_description', 'ftitle', 'fdescription','type' ,'status' 
	
    ];
}