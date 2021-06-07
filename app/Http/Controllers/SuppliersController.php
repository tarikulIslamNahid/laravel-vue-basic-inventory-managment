<?php

namespace App\Http\Controllers;

use App\suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=suppliers::all();
        return response()->json($suppliers);
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
            // 'name' =>'required|unique:suppliers|max:255',
            'email' =>'required|unique:suppliers|max:255',
            'phone' =>'required|unique:suppliers|max:15',
        ]);

        if($request->photo){
            $position=strpos($request->photo,';');
            $sub= substr($request->photo,0,$position);
            $ext= explode('/',$sub)[1];
            $name=time() . '.'.$ext;
            $img=Image::make($request->photo)->resize(270,270);

            $upload_path='backend/suppliers/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $suppliers= new suppliers;
            $suppliers->name=$request->name;
            $suppliers->email=$request->email;
            $suppliers->phone=$request->phone;
            $suppliers->shopname=$request->shopname;
            $suppliers->address=$request->address;
            $suppliers->photo='/'.$image_url;
            $suppliers->save();
        }else{
            $suppliers= new suppliers;
            $suppliers->name=$request->name;
            $suppliers->email=$request->email;
            $suppliers->phone=$request->phone;
            $suppliers->shopname=$request->shopname;
            $suppliers->address=$request->address;
            $suppliers->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suppliers=DB::table('suppliers')->where('id',$id)->first();
        return response()->json($suppliers);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {



        $suppliers= suppliers::find($id);
        $suppliers->name=$request->name;
        $suppliers->email=$request->email;
        $suppliers->phone=$request->phone;
        $suppliers->shopname=$request->shopname;
        $suppliers->address=$request->address;
        $image=$request->photo;
        // $dbData= suppliers::find($id);

        $dbImg= $suppliers->photo;

        if($image != $dbImg){

            $position=strpos($image,';');
            $sub= substr($image,0,$position);
            $ext= explode('/',$sub)[1];
            $name=time() . '.'.$ext;
            $img=Image::make($image)->resize(270,270);

            $upload_path='backend/suppliers/';
            $image_url=$upload_path.$name;
            $success = $img->save($image_url);

            if($success){
                $suppliers->photo='/'.$image_url;
                $ming=ltrim($dbImg, $dbImg[0]);
               $done= unlink($ming);
               $suppliers->update();
            }

        }else{
            $suppliers->photo=$image;
            $suppliers->update();


        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suppliers = DB::table('suppliers')->where('id',$id)->first();
      $photo= $suppliers->photo;
      if($photo){
       $ming=ltrim($photo, $photo[0]);
          unlink($ming);
          DB::table('suppliers')->where('id',$id)->delete();
      }else{
        DB::table('suppliers')->where('id',$id)->delete();

      }
    }
}
