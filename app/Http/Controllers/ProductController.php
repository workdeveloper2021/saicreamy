<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Auth;
use FORM;
use URL;
class ProductController extends Controller
{
    
   
    public function index(Request $request)
    {
        return view('admin.product.index');
    }

    public function productList() {
        $industry = Product::where('status',1)->get();
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
                $btn .= ' <a class="btn btn-primary" href="' . route('product.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->rawColumns([
                'status' => 'status',
                'image' => 'image', 
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        $category = Categorie::where('status','=',1)->pluck('name', 'id')->all();
        
        return view('admin.product.create',compact('category'));
    }

    public function store(Request $request)
    {

         $input = $request->except(['_token']);
         if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'image/'.$filename;
        }
        $result = Product::create($input);
        
        return redirect()->route('product.index')
            ->with('success','Product created successfully.');
    }

   
    public function show($id)
    {
        $post = Product::find($id);

        return view('admin.product.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Product::find($id);
        $category = Categorie::where('status','=',1)->pluck('name', 'id')->all();
        
        return view('admin.product.edit',compact('post','category'));
    }

    public function update(Request $request, $id)
    {
     
         $input = $request->except(['_token']);
         if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'image/'.$filename;
        }

        $post = Product::find($id);
    
        $post->update($input);
          
        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully.');
    }
}