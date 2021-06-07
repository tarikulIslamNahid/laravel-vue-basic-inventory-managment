<?php

namespace App\Http\Controllers;

use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class posController extends Controller
{
  public function catProduct($id){
    $catpro= DB::table('products')->where('cat_id',$id)->get();
    return response()->json($catpro);
  }


  public function orderdone(Request $request){
$validateData=$request->validate([
    'customer_id' =>'required',
    'pay_by' =>'required',
]);

    $data=array();
    $data['customer_id']=$request->customer_id;
    $data['qty']=$request->qty;
    $data['sub_total']=$request->subtotal;
    $data['vat']=$request->vat;
    $data['total']=$request->total;
    $data['pay']=$request->pay;
    $data['due']=$request->due;
    $data['pay_by']=$request->pay_by;
    $data['order_date']=date('d/m/Y');
    $data['order_month']=date('F');
    $data['order_year']=date('Y');
    $order_id=DB::table('order')->insertGetId($data);

    $orders=DB::table('pos')->get();
    $order_details=array();
    foreach($orders as $order){
$order_details['order_id']=$order_id;
$order_details['pro_id']=$order->pro_id;
$order_details['pro_qty']=$order->pro_qty;
$order_details['pro_price']=$order->pro_price;
$order_details['sub_total']=$order->sub_total;
DB::table('order_details')->insert($order_details);


DB::table('products')->where('id',$order->pro_id)->update([
    'product_qty'=>DB::raw('product_qty -' .$order->pro_qty)
]);

    }
    DB::table('pos')->delete();
    return response('done');


}

public function todaySell(){
    $date=date('d/m/Y');
    $sell= DB::table('order')->where('order_date',$date)->sum('total');
    return response()->json($sell);
}
public function todayincome(){
    $date=date('d/m/Y');
    $income= DB::table('order')->where('order_date',$date)->sum('pay');
    return response()->json($income);
}
public function todaydue(){
    $date=date('d/m/Y');
    $due= DB::table('order')->where('order_date',$date)->sum('due');
    return response()->json($due);
}
public function todayexp(){
    $date=date('Y-m-d');
    $exp= DB::table('expenses')->where('expenses_date',$date)->sum('amount');
    return response()->json($exp);
}
public function todaystock(){
    $pro= DB::table('products')->where('product_qty','<','1')->get();
    return response()->json($pro);
}
}
