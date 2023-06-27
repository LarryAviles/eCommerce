@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="h-100 h-custom" style="background-color: #eee;">

            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">

                                <div class="row">

                                    <div class="col-lg-7">
                                        <h5 class="mb-3"><a href="{{ route('products') }}" class="text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a>
                                        </h5>
                                        <hr>

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <p class="mb-1">Shopping cart</p>
                                            </div>
                                            <form action="{{ route('cart.clear') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary">Clear Cart</button>
                                            </form>
                                        </div>
                                        @if ($cartItems->isEmpty())
                                            <p>Your cart is empty.</p>
                                        @else
                                            @foreach ($cartItems as $cartItem)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div>
                                                                    <img
                                                                        src="{{asset($cartItem->product->img)}}"
                                                                        class="img-fluid rounded-3" alt="Shopping item"
                                                                        style="width: 65px;">
                                                                </div>
                                                                <div class="ms-3">
                                                                    <h5>{{$cartItem->product->name}}</h5>
                                                                    <p class="small mb-0">
                                                                        Category: {{$cartItem->product->category}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div style="width: 50px;">
                                                                    <h5 class="fw-normal mb-0">{{ $cartItem->quantity }}</h5>
                                                                </div>
                                                                <div style="width: 80px;">
                                                                    <h5 class="mb-0">
                                                                        ${{ $cartItem->product->price }}</h5>
                                                                </div>
                                                                <form
                                                                    action="{{ route('cart.removeFromCart', ['id' => $cartItem->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"><i
                                                                            class="fas fa-trash-alt"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <div class="col-lg-5">

                                        <div class="card bg-primary text-white rounded-3">
                                            <div class="card-body">

                                                <hr class="my-4">
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Subtotal</p>
                                                    <p class="mb-2">${{ $subtotal }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <h2>Shopping Cart</h2>

        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table>
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->product->name }}</td>
                        <td>${{ $cartItem->product->price }}</td>
                        <td>
                            <form action="{{ route('cart.updateQuantity', ['id' => $cartItem->id]) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="{{ $cartItem->quantity }}">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>${{ $cartItem->product->price * $cartItem->quantity }}</td>
                        <td>
                            <form action="{{ route('cart.removeFromCart', ['id' => $cartItem->id]) }}" method="POST">
                                @csrf
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Subtotal:</td>
                    <td>${{ $subtotal }}</td>
                </tr>
                </tbody>
            </table>

        @endif
    </div>
@endsection
