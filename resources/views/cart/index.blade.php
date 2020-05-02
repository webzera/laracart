@extends('layouts.app')

@section('content')
<div class="container">
	<h2>Your Cart</h2>	
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Name</th>
	      <th scope="col">Price</th>
	      <th scope="col">Quantiry</th>	      
	      <th scope="col"></th>
	      <th scope="col">Sub Total</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach ($cartitems as $cartitem)
	    <tr>
	      <th scope="row">1</th>
	      <td>{{ $cartitem['item']['name'] }}</td>
	      <td>{{ $cartitem['item']['price'] }}</td>
	      <td>
	      <form action="{{ route('cart::update', $cartitem['item']['id']) }}">   	
	      	<input name="quantity" type="number" value="{{ $cartitem['qty'] }}">
	      	<input type="submit" value="update">
	      	</form>
	      </td>
	      
	      <td><a href="{{ route('cart::delete',$cartitem['item']['id']) }}"><i class="fas fa-trash-alt"></i>
</a></td>
		<td>{{ $cartitem['price'] }}</td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>	
	<h3><small>Cart Total Amount </small>$ : {{ $totalPrice }}</h3>
	{{-- <a href="{{ route('checkout.index') }}" class="btn btn-primary" role="button">Proceed to Checkout</a> --}}
</div>  
@endsection