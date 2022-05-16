<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function add(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profile.index',compact('user'));
    }

    public function edit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.profile.edit',compact('editData'));
    }

    public function update(Request $request, $id){

       $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'gander' => 'required',
        'mobile' => 'required',
        'img' => 'required',
       ]);

       $data = User::find(Auth::user()->id);
       $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gander = $request->gander;

        if($request->file('img')){
            $file = $request->file('img');
            @unlink(public_path('uploads/user_img/'.$data->img));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_img'),$filename);
            $data['img'] = $filename;
        }

        $data->save();
        return redirect()->route('profile.add')->with('success','Profile update successfully.!');

    }

    public function password(){
        return view('backend.profile.edit_password');
    }

    public function change(Request $request){

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();

            return redirect()->route('profile.add')->with('InsDone','Password Changed..');
        }
        else{
            return back()->with('error','sory your courrent_password does not match');
        }
    }
}
