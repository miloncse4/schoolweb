<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountCost;

class OtherCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info['allData'] = AccountCost::orderBy('id','desc')->get();
        return view('backend.account.othercost.oth_view',$info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.account.othercost.oth_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);

        $cost = new AccountCost();
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount;
        $cost->description = $request->description;
        if($request->file('img')){
            $file = $request->file('img');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/cost_img'),$filename);
            $cost['img'] = $filename;
        }
        $cost->save();
        return redirect()->route('othercost.view')->with('Done','Cost info insert..!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info['editData'] = AccountCost::find($id);
        return view('backend.account.othercost.oth_edit',$info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);

        $cost = AccountCost::find($id);
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount;
        $cost->description = $request->description;
        if($request->file('img')){
            $file = $request->file('img');
            @unlink(public_path('uploads/cost_img'.$cost->img));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/cost_img'),$filename);
            $cost['img'] = $filename;
        }
        $cost->save();
        return redirect()->route('othercost.view')->with('Done','Cost info insert..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cost = AccountCost::find($id);
        $cost->delete();
        return redirect()->route('othercost.view')->with('rong','Cost info Deleted..??');
    }
}
