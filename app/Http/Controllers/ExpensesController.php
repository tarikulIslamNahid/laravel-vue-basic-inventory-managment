<?php

namespace App\Http\Controllers;

use App\expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses=expenses::all();
        return response()->json($expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'details' =>'required',
            'amount' =>'required',
         ]);

             $categories= new expenses;
             $categories->amount=$request->amount;
             $categories->details=$request->details;
             $categories->expenses_date=$request->date;
             $categories->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expenses=DB::table('expenses')->where('id',$id)->first();
        return response()->json($expenses);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $expenses= expenses::find($id);
        $expenses->amount=$request->amount;
        $expenses->details=$request->details;
        $expenses->expenses_date=$request->expenses_date;

            $expenses->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('expenses')->where('id',$id)->delete();
    }
}
