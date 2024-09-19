<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use DASPRiD\Enum\Exception\IllegalArgumentException;

class CartController extends Controller
{
    public function show(Request $request){
        $cart = new Cart($request->session()->get('cart'));
        return view(
            'cart.show',
            compact('cart')
        );
    }

    public function add(Product $product, Request $request ){
        $cart = new Cart($request->session()->get('cart'));
        $cart->add($product);
        $request->session()->put('cart', $cart);
        return view(
            'cart.show',
            compact('cart')
        );
    }
    public function remove(Product $product, Request $request){
        $cart = new Cart($request->session()->get('cart'));
        $cart->remove($product);
        $request->session()->put('cart', $cart);
        return view(
            'cart.show',
            compact('cart')
        );
    }
    public function removeAll(Product $product, Request $request){
        $cart = new Cart($request->session()->get('cart'));
        $cart->removeAll($product);
        $request->session()->put('cart', $cart);
        return view(
            'cart.show',
            compact('cart')
        );
    }

    public function operate(String $sOperation, Product $product, Request $request){
        $cart = new Cart($request->session()->get('cart'));    
        switch($sOperation){
                case "add": $this->add($product, $request);break;
                case "remove": $this->remove($product, $request);break;
                case "removeAll": $this->removeAll($product, $request); break;
                default: throw new IllegalArgumentException("This operation doesn't exist");
            }
        return view(
            'cart.show',
            compact('cart')
        );
    }
}
