@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Product list</h2>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-4">
            <div class="card">
              <img class="card-img-top" src="{{ asset('img/catimage.jpg') }}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <h3>$ {{ $product->price }}</h3>
                <a href="{{ route('cart::add', $product->id) }}" class="btn btn-primary">Add Card</a>
              </div>
            </div>
            </div>
            @endforeach
        </div>

</div>
@endsection
