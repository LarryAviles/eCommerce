@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container row p-2">
                <div class="col-md-4 col-sm-12">
                    <img src="{{ asset($product->img) }}" class="card-img-top"
                         alt="product_image">
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="card p-3">
                        <h2>{{ $product->name }}</h2>
                        <div class="card-body">
                            <p class="card-text">${{ $product->price }}</p>
                            <p class="card-text">Category: {{ $product->category }}</p>
                            <p class="card-text">Description: {{ $product->description }}</p>
                            <form action="{{ route('products.addToCart', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
