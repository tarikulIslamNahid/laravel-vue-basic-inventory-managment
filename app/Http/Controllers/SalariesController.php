<?php

namespace App\Http\Controllers;

use App\salaries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function paid(Request $request,$id){

        $validate = $request->validate([
            'salary_month'=>'required',
        ]);

        $month=$request->salary_month;


        $checkYear=date('Y');
        $check=DB::table('salaries')->where('emp_id',$id)->where('salary_month',$month)->where('salary_year',$checkYear)->first();
if($check){
    return response()->json('Salary Alrady Paid');
}else{

    $salaries= new salaries;
    $salaries->emp_id=$id;
    $salaries->amount=$request->sallery;
    $salaries->salary_date=date('d/m/y');
    $salaries->salary_month=$month;
    $salaries->salary_year=date('Y');
    $salaries->save();
    return response()->json('Salary Paid Successfully');

}

    }


    public function salary(){
        $salary= DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();
        return response()->json($salary);
    }

public function salaryview($id){
    // $products=DB::table('salaries')->where('salary_month',$id)->get();


    $products=DB::table('salaries')->where('salary_month',$id)
    ->join('employees', 'salaries.emp_id','employees.id')
    ->select('employees.name','employees.phone','salaries.*')
    ->orderBy('salaries.id','DESC')
    ->get();


    return response()->json($products);
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\salaries  $salaries
     * @return \Illuminate\Http\Response
     */
    public function edit(salaries $salaries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\salaries  $salaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salaries $salaries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\salaries  $salaries
     * @return \Illuminate\Http\Response
     */
    public function destroy(salaries $salaries)
    {
        //
    }
}
