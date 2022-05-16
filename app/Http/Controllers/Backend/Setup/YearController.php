<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\Year;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::all();
        return view('backend.setup.year.year_view',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.year.year_create');
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
            'year' => 'required|unique:years,year',
        ]);

        $year = new Year;
        $year->year = $request->year;
        $year->save();

        return redirect()->route('setup.student.year.view')->with('message','Year inserted.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $year_data = Year::find($id);
        return view('backend.setup.year.year_edit',compact('year_data'));
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
        $year_data = Year::find($id);
        $request->validate([
            'year' => 'required|unique:years,year,'.$year_data->id
        ]);
        $year_data->year = $request->year;

        $year_data->update();
        return redirect()->route('setup.student.year.view')->with('message','Year update successfully.!');
    }
}
