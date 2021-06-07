<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class orderController extends Controller
{
    public function getorders(){
        $date=date('d/m/Y');
       $orders= DB::table('order')
        ->join('customers', 'order.customer_id','customers.id')
        ->where('order_date',$date)->select('customers.name','order.*')
        ->orderBy('order.id','DESC')
        ->get();
        return response()->json($orders);

    }
    public function details($id){
        $order=DB::table('order')
            ->join('customers', 'order.customer_id','customers.id')
            ->where('order.id',$id)->select('customers.name','customers.phone','customers.address','order.*')->first();
            return response()->json($order);
    }
    public function orderdetails($id){
        $orderdetails=DB::table('order_details')
        ->join('products','order_details.pro_id', 'products.id')
        ->where('order_details.order_id',$id)->select('products.product_name','products.product_code','products.image','order_details.*')->get();
        return response()->json($orderdetails);
    }
}
