<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

use Session;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }    
    public function index()
    {
        if(!Session::has('webcart')){
            return redirect('/');       
        }
        $oldCart = Session::get('webcart');
    	$cartitems=new Cart($oldCart);
    	return view('cart.index', ['cartitems' => $cartitems->items, 'totalPrice' => $cartitems->totalPrice]);        
    }
    public function add(Request $request, Product $product)
    {
        $oldCart=Session::has('webcart') ? Session::get('webcart') : null;
        $cart= new Cart($oldCart);
        $cart->addCart($product, $product->id);

        $request->session()->put('webcart', $cart);
        return redirect('/');

    }    
    public function update($id)
    {   $qty=request('quantity');
        $oldCart=Session::has('webcart') ? Session::get('webcart') : null; 	
        $updatecart= new Cart($oldCart);
        $updatecart->updateCart($id,$qty);

        Session::put('webcart', $updatecart);
		return back();
    }
    public function delete($id)
    {
        $oldCart=Session::has('webcart') ? Session::get('webcart') : null;
        $delcart= new Cart($oldCart);
        $delcart->deleteCart($id);        
        if($delcart->totalQty==0){
            Session::put('webcart', $delcart);  
            return redirect('/'); 
        }
        Session::put('webcart', $delcart);
        return back();
    }
}
