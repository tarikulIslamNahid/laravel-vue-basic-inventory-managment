<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\cart;
use Illuminate\Http\Request;

class CartController extends Controller
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

public function addcart(Request $request, $id){
    $product= DB::table('products')->where('id',$id)->first();

    $check= DB::table('pos')->where('pro_id',$id)->first();

$check_qty=$product->product_qty;
if($check_qty<1){
return response()->json('Stock Out');
}else{


    if($check){
 DB::table('pos')->where('pro_id',$id)->increment('pro_qty');


    $product=DB::table('pos')->where('pro_id',$id)->first();
    $subtotal=$product->pro_qty*$product->pro_price;
    DB::table('pos')->where('pro_id',$id)->update([
        'sub_total' =>$subtotal
    ]);
    return response()->json('Cart Updated');

    }else{
        $data=array();
        $data['pro_id']=$id;
        $data['pro_name']=$product->product_name;
        $data['pro_qty']=1;
        $data['pro_price']=$product->selling_price;
        $data['sub_total']=$product->selling_price;
       DB::table('pos')->insert($data);
return response()->json('Cart Added');

    }
    }

}

public function getCart(){
    $cart=DB::table('pos')->get();
    return response()->json($cart);
}
public function cartRemove($id){
    DB::table('pos')->where('id',$id)->delete();
}

public function cartInc($id){
    DB::table('pos')->where('id',$id)->increment('pro_qty');
    $product=DB::table('pos')->where('id',$id)->first();
    $subtotal=$product->pro_qty*$product->pro_price;
    DB::table('pos')->where('id',$id)->update([
        'sub_total' =>$subtotal
    ]);
    return response()->json('Done');

}
public function cartDec($id){
    DB::table('pos')->where('id',$id)->decrement('pro_qty');
    $product=DB::table('pos')->where('id',$id)->first();
    $subtotal=$product->pro_qty*$product->pro_price;
    DB::table('pos')->where('id',$id)->update([
        'sub_total' =>$subtotal
    ]);
    return response()->json('Done');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(cart $cart)
    {
        //
    }
}
