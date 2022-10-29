<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Auth;
use URL;
class BlogController extends Controller
{
    
   
    public function index(Request $request)
    {
        return view('admin.blog.index');
    }

    public function blogList() {
        $industry = Blog::where('status',1)->get();
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
                $btn .= ' <a class="btn btn-primary" href="' . route('blog.edit', [$row->id]) . '">Edit</a>';
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
        return view('admin.blog.create');
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
        Blog::create($input);
        return redirect()->route('blog.index')
            ->with('success','Blog created successfully.');
    }

   
    public function show($id)
    {
        $post = Blog::find($id);

        return view('admin.blog.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Blog::find($id);
        return view('admin.blog.edit',compact('post'));
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
        $post = Blog::find($id);
    
        $post->update($input);
    
        return redirect()->route('blog.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        Blog::find($id)->update(array('status' => 0));
        return redirect()->route('blog.index')
            ->with('success', 'Blog deleted successfully.');
    }

   
}