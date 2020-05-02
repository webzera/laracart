<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
    	if($oldCart)
    	{
    		$this->items=$oldCart->items;
    		$this->totalQty=$oldCart->totalQty;
    		$this->totalPrice=$oldCart->totalPrice;
    	}
    }
    public function addCart($item, $id)
    {    	
    	$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
    	if($this->items){
    		if(array_key_exists($id, $this->items)){
    			$storedItem = $this->items[$id];
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['price'] = $item->price * $storedItem['qty'];    	

    	$this->items[$id] = $storedItem;

    	$this->totalQty++;
    	$this->totalPrice += $item->price;
    }
    public function updateCart($id,$qty)
    {    	
    	if($this->items){
    		if(array_key_exists($id, $this->items)){
    			$updateItem = $this->items[$id];
    			// dd($updateItem);
    			$oldQty=$updateItem['qty'];    			
    		}
    	}
    	$updateItem['qty']=$qty;
    	$updateItem['price'] = $updateItem['item']['price'] * $updateItem['qty'];

    	$this->items[$id] = $updateItem;    	
    	$qtyDiff=$qty-$oldQty;	
    	if($qtyDiff>0){
    		$this->totalPrice=$this->totalPrice+($updateItem['item']['price']*$qtyDiff);
    		$this->totalQty=$this->totalQty+$qtyDiff;
    	}else{
    		$qtyMinus=$oldQty-$qty;
    		$this->totalPrice=$this->totalPrice-($updateItem['item']['price']*$qtyMinus);
    		$this->totalQty=$this->totalQty-$qtyMinus;
    	}    	
    }
    public function deleteCart($id)
    {
    	if($this->items){
    		if(array_key_exists($id, $this->items)){   
    		$this->totalQty=$this->totalQty-$this->items[$id]['qty'];
    		$this->totalPrice=$this->totalPrice-$this->items[$id]['price'];    			
   			unset($this->items[$id]);
    		}
    	}
    }
    public static function totalCart()
    {
    	$carts = \Session::get('webcart', []); // Second argument is a default value
    	$totcart=count($carts->items);
    	if(count($carts->items)==0)
    	{
    		\Session::forget('webcart');
    		return 0;
    	}
        return count($carts->items);
    }
}
