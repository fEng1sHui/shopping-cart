<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Cart;
use App\Order;
use App\Product;
use App\Http\Requests;
use Illuminate\Http\Request;
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

    public function postCheckout(Request $request) 
    {
        //validation
         if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
         }

        $oldCart = Session::get('cart');
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

            // Address = Country, Province, City, Street/nr apt, postalcode
            $address = $request->input('country'). ', ' .$request->input('province'). ', ' .$request->input('city'). ', ' .$request->input('address'). ', ' .$request->input('postalcode');
            // save this info to database
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $address;
            $order->name = $request->input('name_on_card');
            $order->payment_id = $charge['id'];

            Auth::user()->orders()->save($order);
        } catch (CardErrorException $e) {
            //save info to database for failed
            return back()->withErrors('Error! ' . $e->getMessage());
        }
        //SUCCESSFUL
        Session::forget('cart');
        return redirect()->route('product.index')->with('success_message', 'Thank you! Your payment has been accepted.');
    }
}
