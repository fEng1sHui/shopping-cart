<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Stripe\Charge;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;


class ProductController extends Controller
{
    public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id) {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);
    	return redirect()->route('product.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() 
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    // public function postCheckout(Request $request) 
    // {
    //     if (!Session::has('cart')) {
    //         return redirect()->route('shop.shoppingCart');
    //     }
    //     $oldCart = Session::get('cart');
    //     $cart = new Cart($oldCart);

    //     Stripe::setApiKey("sk_test_rPwOarKawLMG6XEfVvKKjbim00zSegIyrX");

    //     $charge = Charge::create([
    //         'amount' => 25,
    //         'currency' => 'usd',
    //         'description' => 'Example charge',
    //         'source' => $request->input('stripeToken'),
    //     ]);
    // }

    public function postCheckoutSubmit(Request $request) 
    {
        //validation
         if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
         }

        $oldCart =Session::get('cart');
        $cart = new Cart($oldCart);

        try {
            $charge = Stripe::charges()->create([
                'amount' => $cart->totalPrice,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Test Charge',
                'receipt_email' => $request->email,
                'metadata' => [
                    'data1' => 'metadata 1',
                    'data2' => 'metadata 2',
                    'data3' => 'metadata 3',
               ],
            ]);

            // save this info to your database

            //SUCCESSFUL
            Session::forget('cart');
            return redirect()->route('product.index')->with('success_message', 'Thank you! Your payment has been accepted.');
        } catch (CardErrorException $e) {
            //save info to database for failed
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
}
