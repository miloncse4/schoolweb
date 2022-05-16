<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use Illuminate\Support\Facades\DB;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = StudentClass::all();
        return view('backend.setup.st_class_index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.st_class_create');
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
            'class_name' => 'required|unique:student_classes,class_name',
        ]);

        $class = new StudentClass;
        $class->class_name = $request->class_name;
        $class->save();

        return redirect()->route('setup.student.view')->with('message','class inserted.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class_data = StudentClass::find($id);
        return view('backend.setup.st_class_edit',compact('class_data'));
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
        $class_data = StudentClass::find($id);
        $request->validate([
            'class_name' => 'required|unique:student_classes,class_name,'.$class_data->id
        ]);
        $class_data->class_name = $request->class_name;

        $class_data->update();
        return redirect()->route('setup.student.view')->with('message','class update successfully.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StudentClass::find($id);
        $data->delete();
        return back();
    }
}
