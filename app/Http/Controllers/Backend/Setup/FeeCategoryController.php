<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\FeeCategory;
use Illuminate\Support\Facades\DB;

class FeeCategoryController extends Controller
{
              /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = FeeCategory::all();
        return view('backend.setup.fee.fee_view',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.fee.fee_create');
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
            'fee_category' => 'required|unique:fee_categories,fee_category',
        ]);

        $fee = new FeeCategory;
        $fee->fee_category = $request->fee_category;
        $fee->save();

        return redirect()->route('setup.fee.view')->with('message','Stuent Fee add inserted.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = FeeCategory::find($id);
        return view('backend.setup.fee.fee_edit',compact('info'));
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
        $info = FeeCategory::find($id);
        $request->validate([
            'fee_category' => 'required|unique:fee_categories,fee_category,'.$info->id
        ]);
        $info->fee_category = $request->fee_category;

        $info->update();
        return redirect()->route('setup.fee.view')->with('message','Student fee update update successfully.!');
    }
}
