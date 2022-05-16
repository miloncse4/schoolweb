<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use Illuminate\Support\Facades\DB;

class FeeAmountController extends Controller
{
                  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amounts = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.amount_view',compact('amounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.amount_create',$data);
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
            'fee_category_id' => 'required',
            'class_id' => 'required',
            'amount' => 'required',
        ]);

        $amount = new FeeCategoryAmount;
        $amount->fee_category_id = $request->fee_category_id;
        $amount->class_id = $request->class_id;
        $amount->amount = $request->amount;
        $amount->save();

        return redirect()->route('setup.fee.amount.view')->with('message','Stuent amount add inserted.!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fee_category_id)
    {
        $data['edit_info'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->get();
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.amount_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fee_category_id)
    {
        $request->validate([
            'fee_category_id' => 'required',
            'class_id' => 'required',
            'amount' => 'required',
        ]);
        if($request->class_id == NULL){
            return redirect()->back()->with('error','Sory ! you do not select any item.!');
        }
        else{
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();
            $amount = new FeeCategoryAmount;
            $amount->fee_category_id = $request->fee_category_id;
            $amount->class_id = $request->class_id;
            $amount->amount = $request->amount;
            $amount->save();
        }
        return redirect()->route('setup.fee.amount.view')->with('message','Student fee update update successfully.!');
    }

    public function details($fee_category_id){
        $data['edit_info'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->get();
        return view('backend.setup.fee_amount.amount_details',$data);
    }
}
