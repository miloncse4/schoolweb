<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\Shift;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
                /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::all();
        return view('backend.setup.shift.view',compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.shift.create');
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
            'shift' => 'required|unique:shifts,shift',
        ]);

        $shift = new Shift;
        $shift->shift = $request->shift;
        $shift->save();

        return redirect()->route('setup.student.shift.view')->with('message','Shift inserted.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Shift::find($id);
        return view('backend.setup.shift.edit',compact('info'));
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
        $info = Shift::find($id);
        $request->validate([
            'shift' => 'required|unique:shifts,shift,'.$info->id
        ]);
        $info->shift = $request->shift;

        $info->update();
        return redirect()->route('setup.student.shift.view')->with('message','Shift update successfully.!');
    }
}
