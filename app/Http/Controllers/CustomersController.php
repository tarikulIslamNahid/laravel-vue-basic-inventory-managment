<?php

namespace App\Http\Controllers;

use App\customers;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=customers::all();
        return response()->json($customers);
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
            'name' =>'required|unique:customers|max:255',
            'phone' =>'required|unique:customers|max:15',
        ]);

        if($request->photo){
            $position=strpos($request->photo,';');
            $sub= substr($request->photo,0,$position);
            $ext= explode('/',$sub)[1];
            $name=time() . '.'.$ext;
            $img=Image::make($request->photo)->resize(270,270);

            $upload_path='backend/customer/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $customers= new customers;
            $customers->name=$request->name;
            $customers->email=$request->email;
            $customers->phone=$request->phone;
            $customers->address=$request->address;
            $customers->photo='/'.$image_url;
            $customers->save();
        }else{
            $customers= new customers;
            $customers->name=$request->name;
            $customers->email=$request->email;
            $customers->phone=$request->phone;
            $customers->address=$request->address;
            $customers->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers=DB::table('customers')->where('id',$id)->first();
        return response()->json($customers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {



        $customers= customers::find($id);
        $customers->name=$request->name;
        $customers->email=$request->email;
        $customers->phone=$request->phone;
        $customers->address=$request->address;
        $image=$request->photo;
        // $dbData= customers::find($id);

        $dbImg= $customers->photo;

        if($image != $dbImg){

            $position=strpos($image,';');
            $sub= substr($image,0,$position);
            $ext= explode('/',$sub)[1];
            $name=time() . '.'.$ext;
            $img=Image::make($image)->resize(270,270);

            $upload_path='backend/customer/';
            $image_url=$upload_path.$name;
            $success = $img->save($image_url);

            if($success){
                $customers->photo='/'.$image_url;
                $ming=ltrim($dbImg, $dbImg[0]);
               $done= unlink($ming);
               $customers->update();
            }

        }else{
            $customers->photo=$image;
            $customers->update();


        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = DB::table('customers')->where('id',$id)->first();
      $photo= $customers->photo;
      if($photo){
       $ming=ltrim($photo, $photo[0]);
          unlink($ming);
          DB::table('customers')->where('id',$id)->delete();
      }else{
        DB::table('customers')->where('id',$id)->delete();

      }
    }
}
