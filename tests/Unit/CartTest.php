<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;

use Illuminate\Support\Facades\App;
use Tests\TestCase;
use App\Models\Cart;
use App\Models\Product; 

class CartTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testConstructor(): void
    {
        $cart = new Cart();

        $this->assertEquals(0,          $cart->iTotalItems);
        $this->assertEquals(0,          $cart->dTotalPrice);
        $this->assertEquals(array(),    $cart->htItem);
    }

    public function testAdd(){
        $cart = new Cart();
        $product = Product::first();

        $cart->add($product);
        $cart->add($product);
        $cart->add($product);

        $this->assertEquals(3, $cart->iTotalItems);
        $this->assertEquals(($product->price * 3), $cart->dTotalPrice);
    }

    public function testRemove(){
        $cart = new Cart();
        $product = Product::first();

        $cart->add($product);
        $cart->add($product);
        $cart->add($product);

        $cart->remove($product);
        $this->assertEquals(2, $cart->iTotalItems);
    }

    public function testRemoveAll(){
        $cart = new Cart();
        $product = Product::first();

        $cart->add($product);
        $cart->add($product);
        $cart->add($product);
        
        $cart->removeAll($product);
        $this->assertEquals(0, $cart->iTotalItems);
    }
}
