<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;
use FORM;
use URL;
class UserController extends Controller
{
    
    public function index(Request $request)
    {
        return view('admin.user.index');
    }

     public function userList() {
        $industry = User::where('status',1)->get();
        return datatables()->of($industry)
            ->editColumn('created_at', '{{ date("d-m-Y", strtotime($created_at)) }}')
            ->editColumn('status', function($row) {
                            return $row->status == 1 ? '<span style="color:green">Active</span>' : '<span style="color:red">In-Active</span>';
                            })
            ->addColumn('action', function($row) {
                $btn = '';
                $btn .= '<div class="btn-group">';
                $btn .= ' <a class="btn btn-primary" href="' . route('user.edit', [$row->id]) . '">Edit</a>';
                return $btn;
            })
            ->rawColumns([
                'status' => 'status',
                'image' => 'image',
                'action' => 'action'
            ])
            ->make(true);
    }

    public function edit($id)
    {
        $post = User::find($id);
        return view('admin.user.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->except(['_token']);
        if($input['password'] != ''){
        $input['password'] = Hash::make($input['password']); 
        }
        $post = User::find($id);
    
        $post->update($input);         
    
        return redirect()->route('user.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully.');
    }

}