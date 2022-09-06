<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\Auth;

class OrderAdminController extends Controller
{
    public function index(){
        $orders = Order::with('order_status')->get();
        $order_status = OrderStatus::get();
        return view('admin.order.list-order', ['orders' => $orders, 'order_status'=>$order_status]);
    }
    public function order_detail(Order $order){
        // $order_detail = OrderDetail::where('user_id', '=', Auth::id())->get();
        // $order_pro = OrderProduct::find(Auth::id())->get();
        // foreach ($order_detail as $value) {
        //     $order_pro->update([
        //         'attribute' => $value->attribute,
        //     ]);
        // }
        $order_product= OrderProduct::with(['product','order'])->where('order_id', '=', $order->id)->get();
        
        return view('admin.order.order-detail',['order_product'=>$order_product]);
    }

    public function fix_order_status(Order $order, Request $request){
        $order->update([
            'order_status_id'=>$request->fix_order_sts,
        ]);
        return redirect()->route('admin.order.list-order');
    }


}
