<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Otherimage;
use App\Models\Font;
use Illuminate\Http\Request;
use Auth;
use FORM;
use URL;
class PrintController extends Controller
{
    
    

   
    public function index(Request $request)
    {
        return view('admin.print.index');
    }

    public function printList() {
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

    
    public function create()
    {   
        $font = font::where('status','=',1)->pluck('name', 'id')->all();
        return view('admin.print.create',compact('font'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

         $input = $request->except(['_token']);
        if($request->file('banner')){
            $file= $request->file('banner');
            $extension = $request->file('banner')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['banner']= 'image/'.$filename;
        }
         if($request->file('video')){
            $file= $request->file('video');
            $extension = $request->file('video')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['video']= 'image/'.$filename;
        }

        if(isset($input['size'])){
        $input['size'] = implode(',', $input['size']);
        }
        if(isset($input['ftitle'])){
        $input['ftitle'] = implode('|', array_filter($input['ftitle']));
        }
        if(isset($input['fdescription'])){
        $input['fdescription'] = implode('|', array_filter($input['fdescription']));
        }

        $input['type'] = 'print';
        $result = Product::create($input);
        
        return redirect()->route('print.index')
            ->with('success','Print created successfully.');
    }

   
    public function show($id)
    {
        $post = Product::find($id);
   
        return view('admin.print.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Product::find($id);
        $images = Otherimage::where(array('product_id'=>$post->id,'type'=>'print'))->get();
        $font = font::where('status','=',1)->pluck('name', 'id')->all();
       
        return view('admin.print.edit',compact('post','images','font'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

         $input = $request->except(['_token']);
        if($request->file('banner')){
            $file= $request->file('banner');
            $extension = $request->file('banner')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['banner']= 'image/'.$filename;
        }
         if($request->file('video')){
            $file= $request->file('video');
            $extension = $request->file('video')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['video']= 'image/'.$filename;
        }

        if(isset($input['size'])){
        $input['size'] = implode(',', $input['size']);
        }
        if(isset($input['ftitle'])){
        $input['ftitle'] = implode('|', array_filter($input['ftitle']));
        }
        if(isset($input['fdescription'])){
        $input['fdescription'] = implode('|', array_filter($input['fdescription']));
        }



        $post = Product::find($id);
    
        $post->update($input);         
    
        return redirect()->route('print.index')
            ->with('success', 'Print updated successfully.');
    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->route('print.index')
            ->with('success', 'Print deleted successfully.');
    }

    public function getfontPrice(Request $request){
        $font = 0;
        $product = 0;
        $id = $request->font;
        $pro_id = $request->pro_id;       
        $font = Font::where('name',$id)->first('price');
        $product = Product::where('id',$pro_id)->first();
        if($request->text !=''){
            $text = strlen($request->text)*$product->per_character_price;
            return ($font->price+$product->price)+$text;
        }else{

            return $font->price+$product->price;
        }
        
    }
}