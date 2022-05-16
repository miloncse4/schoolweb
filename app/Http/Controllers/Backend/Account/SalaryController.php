<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountEmpolyeSalary;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = AccountEmpolyeSalary::all();
        return view('backend.account.salary.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.account.salary.add');
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
            'name' => 'required',
            'mobile_no' => 'required',
            'date' => 'required',
            'salary' => 'required',
        ]);

        $data = new AccountEmpolyeSalary();
        $data->name = $request->name;
        $data->mobile_no = $request->mobile_no;
        $data->date = $request->date;
        $data->salary = $request->salary;

        $data->save();
        return redirect()->route('salary.view')->with('Done','Salary Entry Successfully.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info['info'] = AccountEmpolyeSalary::find($id);
        return view('backend.account.salary.edit',$info);
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
            'name' => 'required',
            'mobile_no' => 'required',
            'date' => 'required',
            'salary' => 'required',
        ]);

        $data = AccountEmpolyeSalary::find($id);
        $data->name = $request->name;
        $data->mobile_no = $request->mobile_no;
        $data->date = $request->date;
        $data->salary = $request->salary;

        $data->update();
        return redirect()->route('salary.view')->with('Done','Salary Entry Successfully.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AccountEmpolyeSalary::find($id);
        $data->delete();
        return redirect()->route('rong')->with('rong','Salary information Delete..?');
    }
}
