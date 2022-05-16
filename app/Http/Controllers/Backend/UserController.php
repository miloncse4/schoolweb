<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function view(){
        $user_data = User::where('usertype','admin')->get();
        return view('user.view_user',compact('user_data'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
        ]);
        
        $data = new User();
        $code = rand(0000,9999);
        $data->usertype = 'admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        $data->save();

        return redirect()->route('user.view')->with('InsDone','Insert Successfuly.!');
    }

    public function edit($id){
        $info = User::find($id);
        return view('user.edit',compact('info'));

    }

    public function update (Request $request, $id){
        $request->validate([
            'role' => 'required|string',
            'name' => 'required|string',
            'email' => 'required',
        ]);

        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->update();

        return redirect()->route('user.view')->with('InsDone','update success..!');
    }

    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return back();
    }
}
