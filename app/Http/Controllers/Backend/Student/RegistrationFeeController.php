<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\FeeCategoryAmount;
use App\Models\DiscountStudent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\StudentClass;
use App\Models\FeeCategory;
use App\Models\Shift;
use App\Models\Year;
use App\Models\RegistrationFee;
use File;

class RegistrationFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = RegistrationFee::all();
        return view('backend.student.reg_fee.view',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.student.reg_fee.add');
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
            'class_name' => 'required',
            'fee_name' => 'required',
            'amount' => 'required',
        ]);

        $data = new RegistrationFee;

        $data->class_name = $request->class_name;
        $data->fee_name = $request->fee_name;
        $data->amount = $request->amount;
        $data->discount = $request->discount;
        $demo = $request->discount/100*$request->amount;
        $finalfee = $request->amount-$demo;
        $data->total = $finalfee;
        $data->save();

        return redirect()->route('student.regist.fee.view')->with('message','Registration fee added By Admin');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = RegistrationFee::find($id);
        return view('backend.student.reg_fee.edit',compact('info'));
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
            'class_name' => 'required',
            'fee_name' => 'required',
            'amount' => 'required',
        ]);

        $data = RegistrationFee::find($id);

        $data->class_name = $request->class_name;
        $data->fee_name = $request->fee_name;
        $data->amount = $request->amount;
        $data->discount = $request->discount;
        $demo = $request->discount/100*$request->amount;
        $finalfee = $request->amount-$demo;
        $data->total = $finalfee;
        $data->update();

        return redirect()->route('student.regist.fee.view')->with('message','Registration fee update.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RegistrationFee::find($id);
        $data->delete();
        return back();
    }
}
