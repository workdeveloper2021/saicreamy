<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
 
    public function index()
    {
         $role = Auth::user()->type;
         if($role == 'admin'){
         
             return view('admin.dashboard');
         }
         return view('index');
    }
}
