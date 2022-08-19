<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
       
        return view('shop')->with(['products' => $products]);
    }

    public function caja()
    {
        $products = Product::all();
       
        return view('caja')->with(['products' => $products]);
    }

    public function cart(){
        $cartCollection = \Cart::getContent();
        return view('cart')->with(['cartCollection' => $cartCollection]);
    }


    public function mensaje()
    {
        return redirect()->route('caja')->with('success_msg', 'Compre Exitosa, Vuelva Pronto!');
    }

    public function add(Request $request){

        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' =>  $request->img,
                'slug' => $request->slug,
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Producto Añadido al Carrito');
    }
    

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Producto Removido de su Carrito!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Actualizado!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart.index')->with('success_msg', 'Carrito Limpiado!');
    }





}
