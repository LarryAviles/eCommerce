@extends('layouts.app')

@section('content')
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="{{ asset('images/slider/slider_1.jpg') }}" class="d-block w-100" alt="slider_image_1">
                <div class="carousel-caption d-none d-md-block text-white">
                    <h5>Sport</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores cum doloribus
                        ducimus eaque eos et, exercitationem illum inventore, nostrum odio officia omnis perspiciatis
                        praesentium quas quos repellendus sint tempora.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="{{ asset('images/slider/slider_2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-white">
                    <h5>Home</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores doloremque eius est
                        explicabo labore molestias nam nostrum sapiente vitae voluptatibus. Cum eos iure necessitatibus
                        sed suscipit temporibus ullam vel, veniam?</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/slider/slider_3.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-white">
                    <h5>Clothing</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt non obcaecati placeat quam
                        quia rem sequi voluptas. Accusamus adipisci debitis, in, incidunt maiores molestias non
                        reiciendis, similique vel veritatis voluptatum?</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="container row mt-4 ">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 p-2 justify-content-center">
                        <div class="card">
                            <a href="#">
                                <img src="{{ $product['img'] }}" class="card-img-top" alt="product_image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold">{{ $product['name'] }}</h5>
                                <p class="card-text">${{ $product['price'] }}</p>
                                <p class="card-text">Category: {{ $product['category'] }}</p>
                                <a href="#" class="btn btn-primary">Add to the Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <a href="{{route('products')}}">
                        <h3 class="text-center">View all</h3>
                    </a>
            </div>
        </div>
    </div>
@endsection
