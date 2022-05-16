<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\MonthlyFee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\StudentClass;
use App\Models\Group;
use App\Models\Shift;
use App\Models\Year;
use File;

class MonthlyFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mon = MonthlyFee::all();
        return view('backend.student.monthly_fee.m_view',compact('mon'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.student.monthly_fee.m_create');
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

        $data = new MonthlyFee;

        $data->class_name = $request->class_name;
        $data->fee_name = $request->fee_name;
        $data->amount = $request->amount;
        $data->save();

        return redirect()->route('student.monthly.view')->with('message','Monthly fee added By Admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MonthlyFee::find($id);
        return view('backend.student.monthly_fee.m_edit',compact('data'));
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

        $data = MonthlyFee::find($id);

        $data->class_name = $request->class_name;
        $data->fee_name = $request->fee_name;
        $data->amount = $request->amount;
        $data->update();

        return redirect()->route('student.monthly.view')->with('message','Monthly fee update..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MonthlyFee::find($id);
        $data->delete();

        return back();
    }
}
