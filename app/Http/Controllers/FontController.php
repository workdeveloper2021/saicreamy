<?php

namespace App\Http\Controllers;

use App\Models\Font;
use Illuminate\Http\Request;
use Auth;
class FontController extends Controller
{
    
   
    public function index(Request $request)
    {
        return view('admin.font.index');
    }

    public function fontList() {
        $industry = Font::where('status',1)->get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
              ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span style="color:green">Active</span>' : '<span style="color:red">In-Active</span>';
                        })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('font.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->rawColumns([
                'status' => 'status',
                'category_code' => 'category_code',
                'action' => 'action'
            ])
            ->make(true);
    }

    
    public function create()
    {   
        return view('admin.font.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->except(['_token']);
        $input['user_id'] = Auth::user()->id;
        Font::create($input);
    
        return redirect()->route('font.index')
            ->with('success','Font created successfully.');
    }

   
    public function show($id)
    {
        $post = Font::find($id);

        return view('admin.font.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Font::find($id);
        return view('admin.font.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $post = Font::find($id);
    
        $post->update($request->all());
    
        return redirect()->route('font.index')
            ->with('success', 'Font updated successfully.');
    }

    public function destroy($id)
    {
        Font::find($id)->update(array('status' => 0));
        return redirect()->route('font.index')
            ->with('success', 'Font deleted successfully.');
    }

   
}