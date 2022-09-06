<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    // public function index(){
    //     return view('account.my-account');
    // }
    public function index(){
        $orders = Order::with('order_status')->where('user_id','=', Auth::id())->get();
        $order_status = OrderStatus::get();
        
        return view('account.my-account', ['orders' => $orders, 'order_status'=>$order_status]);
    }
}
