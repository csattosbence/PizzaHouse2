<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class OrdersController extends Controller
{
    public function show()
    {
        //dd(Auth::user());
        if( Auth::user() == null) {
            return redirect()->route('home.show');
        }

        if (Auth::user()->role != "Admin") {
            return redirect()->route('home.show');
        }

        $orders = $this->getOrders();
        return view('orders')->with(compact('orders'));

    }

    public function store(Request $request)
    {
        if(!$request->session()->has('cart'))
        {
            return redirect()->route('cart.show');
        }
        $cart = $request->session()->get('cart');


        $order = Order::create([
            'user_id' => Auth::user()->id,
            'price' => $cart->totalPrice,
            'status' => 'Pending',
        ]);

        foreach ($cart->items as $ordered_item)
        {
            $orderProduct = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $ordered_item['item']->id
            ]);
        }
        $request->session()->forget('cart');
        
        return  view('order_success');
    }

    public function getOrders()
    {

        $orders = DB::table('order_products')
            ->join('orders', 'orders.id', '=', 'order_products.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.id','users.name','users.email','orders.price')
            ->where('orders.status','=','Pending')->groupBy('orders.id')
            ->get();


        foreach ($orders as $order){

            $order_items = DB::table('products')
                ->select('products.name','products.price')
                ->join('order_products','order_products.product_id','=','products.id')
                ->where('order_products.order_id', '=', $order->id)
                ->get();

            $order->order_items = $order_items;
        }

        return $orders;
    }
}
