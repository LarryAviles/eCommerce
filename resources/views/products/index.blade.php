@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <form action="{{ route('products.filter') }}" method="POST" class="form-inline">
                <div class="row">
                    @csrf
                    <div class="row form-group col-md-3 col-sm-12">
                        <div class="col-3">
                            <label for="category">Category:</label>
                        </div>
                        <div class="col-9">
                            <select name="category" id="category" class="form-control">
                                <option value="all">All categories</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Clothing">Clothing</option>
                                <option value="Home">Home</option>
                                <option value="Sports">Sports</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-4 col-sm-12 row">
                        <div class="col-md-4 align-middle">
                            <label class="align-middle">Price Range:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="align-range">
                                <label id="min-price-label"></label>
                                <label id="max-price-label"></label>
                            </div>
                            <div id="price-range"></div>
                            <div class="align-range">
                                <label>Min</label>
                                <label>Max</label>
                            </div>
                            <input type="hidden" name="min_price" id="min_price">
                            <input type="hidden" name="max_price" id="max_price">
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <div class="container row mt-4 ">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 p-2 justify-content-center">
                        <div class="card">
                            <a href="{{ route('products.show', ['id' => $product->id]) }}">
                                <img src="{{ asset($product->img) }}" class="card-img-top" alt="product_image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-bold">{{ $product->name }}</h5>
                                <p class="card-text">${{ $product->price }}</p>
                                <p class="card-text">Category: {{ $product->category }}</p>
                                <form action="{{ route('products.addToCart', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <script>
        $(function () {
            let minPrice = 0;
            let maxPrice = 100;

            $('#price-range').slider({
                range: true,
                min: 0,
                max: 100,
                values: [minPrice, maxPrice],
                slide: function (event, ui) {
                    $('#min_price').val(ui.values[0]);
                    $('#max_price').val(ui.values[1]);
                    $('#min-price-label').text('$' + ui.values[0]);
                    $('#max-price-label').text('$' + ui.values[1]);
                }
            });

            $('#min_price').val(minPrice);
            $('#max_price').val(maxPrice);
            $('#min-price-label').text('$' + minPrice);
            $('#max-price-label').text('$' + maxPrice);
        });
    </script>
@endsection
