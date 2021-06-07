<?php

namespace App\Http\Controllers;

use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products=DB::table('products')
                ->join('categories', 'products.cat_id','categories.id')
                ->join('suppliers', 'products.supplier_id','suppliers.id')
                ->select('categories.name as cat_name','suppliers.name as sup_name','products.*')
                ->orderBy('products.id','DESC')
                ->get();
                return response()->json($products);

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
            'product_name' =>'required|unique:products|max:255',
            'product_code' =>'required|unique:products|max:255',
            'cat_id' =>'required',
            'supplier_id' =>'required',
            'buying_price' =>'required',
            'selling_price' =>'required',
            'buying_date' =>'required',
            'product_qty' =>'required',
        ]);

        if($request->photo){
            $position=strpos($request->photo,';');
            $sub= substr($request->photo,0,$position);
            $ext= explode('/',$sub)[1];
            $name=time() . '.'.$ext;
            $img=Image::make($request->photo)->resize(270,270);

            $upload_path='backend/products/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $products= new products;
            $products->product_name=$request->product_name;
            $products->product_code=$request->product_code;
            $products->cat_id=$request->cat_id;
            $products->supplier_id=$request->supplier_id;
            $products->buying_price=$request->buying_price;
            $products->selling_price=$request->selling_price;
            $products->buying_date=$request->buying_date;
            $products->product_qty=$request->product_qty;
            $products->root=$request->root;
            $products->image='/'.$image_url;
            $products->save();
        }else{
            $products= new products;
            $products->product_name=$request->product_name;
            $products->product_code=$request->product_code;
            $products->cat_id=$request->cat_id;
            $products->supplier_id=$request->supplier_id;
            $products->buying_price=$request->buying_price;
            $products->selling_price=$request->selling_price;
            $products->buying_date=$request->buying_date;
            $products->product_qty=$request->product_qty;
            $products->root=$request->root;
            $products->save();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products=DB::table('products')->where('id',$id)->first();
        return response()->json($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

            $products= products::find($id);
            $products->product_name=$request->product_name;
            $products->product_code=$request->product_code;
            $products->cat_id=$request->cat_id;
            $products->supplier_id=$request->supplier_id;
            $products->buying_price=$request->buying_price;
            $products->selling_price=$request->selling_price;
            $products->buying_date=$request->buying_date;
            $products->product_qty=$request->product_qty;
            $products->root=$request->root;
            $image=$request->image;
        // $dbData= suppliers::find($id);

        $dbImg= $products->image;

        if($image != $dbImg){

            $position=strpos($image,';');
            $sub= substr($image,0,$position);
            $ext= explode('/',$sub)[1];
            $name=time() . '.'.$ext;
            $img=Image::make($image)->resize(270,270);

            $upload_path='backend/products/';
            $image_url=$upload_path.$name;
            $success = $img->save($image_url);

            if($success){
                $products->image='/'.$image_url;
                $ming=ltrim($dbImg, $dbImg[0]);
               $done= unlink($ming);
               $products->update();
            }

        }else{
            $products->image=$image;
            $products->update();


        }

    }



    public function stockupdate(Request $request,$id){
        $products= products::find($id);
        $products->product_qty=$request->product_qty;

            $products->update();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = DB::table('products')->where('id',$id)->first();
        $photo= $products->image;
        if($photo){
         $ming=ltrim($photo, $photo[0]);
            unlink($ming);
            DB::table('products')->where('id',$id)->delete();
        }else{
          DB::table('products')->where('id',$id)->delete();

        }
    }
}
