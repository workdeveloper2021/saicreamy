<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Auth;
use URL;
class CategoryController extends Controller
{
    
   
    public function index(Request $request)
    {
        return view('admin.category.index');
    }

    public function categoryList() {
        $industry = Categorie::where('status',1)->get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            
            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span style="color:green">Active</span>' : '<span style="color:red">In-Active</span>';
                        })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('category.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->rawColumns([
                'status' => 'status',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        return view('admin.category.create');
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
        Categorie::create($input);
        return redirect()->route('category.index')
            ->with('success','Category created successfully.');
    }

   
    public function show($id)
    {
        $post = Categorie::find($id);

        return view('admin.category.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Categorie::find($id);
        return view('admin.category.edit',compact('post'));
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
        $post = Categorie::find($id);
    
        $post->update($input);
    
        return redirect()->route('category.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        Categorie::find($id)->update(array('status' => 0));
        return redirect()->route('category.index')
            ->with('success', 'Category deleted successfully.');
    }

   
}