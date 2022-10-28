<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Otherimage;
use Illuminate\Http\Request;
use Auth;
use FORM;
use URL;
class VectorController extends Controller
{
     
    public function index(Request $request)
    {
        return view('admin.vector.index');
    }

    public function vectorList() {
        $industry = Product::where('type','vector')->where('status',1)->get();
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
                $btn .= ' <a class="btn btn-primary" href="' . route('vector.edit', [$row->id]) . '">Edit</a>';
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
        return view('admin.vector.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

         $input = $request->except(['_token']);
         if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'image/'.$filename;
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

        if(isset($input['color'])){
        $input['color'] = implode(',', $input['color']);
        }
        if(isset($input['ftitle'])){
        $input['ftitle'] = implode('|', array_filter($input['ftitle']));
        }
        if(isset($input['fdescription'])){
        $input['fdescription'] = implode('|', array_filter($input['fdescription']));
        }

        $input['type'] ='vector';
        $result = Product::create($input);
       
        return redirect()->route('vector.index')
            ->with('success','Vector Walldecals created successfully.');
    }

   
    public function show($id)
    {
        $post = Product::find($id);

        return view('admin.vector.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Product::find($id);
        $images = Otherimage::where(array('product_id'=>$post->id,'type'=>'walldecal'))->get();
       
        return view('admin.vector.edit',compact('post','images'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

         $input = $request->except(['_token']);
         if($request->file('image')){
            $file= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = date('YmdHi'). '_'. rand('0000','9999').'.'.$extension;
            $file->move(public_path('image/'), $filename);
            $input['image']= 'image/'.$filename;
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
        
        if(isset($input['color'])){
        $input['color'] = implode(',', $input['color']);
        }
         if(isset($input['ftitle'])){
        $input['ftitle'] = implode('|', array_filter($input['ftitle']));
        }
        if(isset($input['fdescription'])){
        $input['fdescription'] = implode('|', array_filter($input['fdescription']));
        }




        $post = Product::find($id);
    
        $post->update($input);
        
        return redirect()->route('vector.index')
            ->with('success', 'Vector Walldecals updated successfully.');
    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->route('vector.index')
            ->with('success', 'Vector Walldecals deleted successfully.');
    }
}