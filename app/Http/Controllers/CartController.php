<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;


class CartController extends Controller
{
    public function show(){
        if (!Session::has('cart'))
        {
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = New Cart($oldCart);

        return view('cart',
            ['products'=>$cart->items,
             'totalPrice'=>$cart->totalPrice,
             'totalQuantity'=>$cart->totalQuantity]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart',$cart);

        return redirect()->route('cart.show');
    }
    public function increaseQuantity(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart',$cart);

        return redirect()->route('cart.show');
    }
    public function decreaseQuantity(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->extract($product,$product->id);
        if (empty($cart->items)){
            $request->session()->forget('cart');
        }else{
            $request->session()->put('cart',$cart);
        }

        return redirect()->route('cart.show');
    }

}
