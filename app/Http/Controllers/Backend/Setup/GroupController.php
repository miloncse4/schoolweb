<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\Group;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('backend.setup.group.gp_view',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.group.gp_create');
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
            'group' => 'required|string|unique:groups,group',
        ]);

        $group = new Group;
        $group->group = $request->group;
        $group->save();

        return redirect()->route('setup.student.group.view')->with('message','Group inserted.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group_info = Group::find($id);
        return view('backend.setup.group.gp_edit',compact('group_info'));
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
        $group_info = Group::find($id);
        $request->validate([
            'group' => 'required|string|unique:groups,group,'.$group_info->id
        ]);
        $group_info->group = $request->group;

        $group_info->update();
        return redirect()->route('setup.student.group.view')->with('message','Group update successfully.!');
    }
}
