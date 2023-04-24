<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        return view('order.index')->with('orders', Order::where('user_id',Auth()->user()->id)->get());
    }

    public function store(Request $request){
        $cart = Cart::where('user_id', Auth()->user()->id);
        //validação se tem produto no carrinho
         if($cart->get()->count()== 0){
            return redirect(route('cart.index'));
         }
         // Validação dos campos de cep
            $request->validate([
            'zipcode' => 'required|numeric|digits_between:8,8',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);
        $order = Order::create([
            'user_id' => Auth()->user()->id,
            'zipcode' => $request->zipcode,
            'address' => $request->address,
            'city'    => $request->city,
            'state'   => $request ->state

        ]);



        foreach($cart->get() as $item){
            $order-> Products()->attach([
                $item->product_id => [
                    'name' => $item->Product->name,
                    'price'=> $item->Product->price,
                    'units'=> $item->units
                ]
                ]);
        }

        $cart->delete();
        return redirect(route('order.index'));
    }

}



