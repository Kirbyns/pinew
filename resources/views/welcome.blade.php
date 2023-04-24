@extends('layouts.store')

@section('content')
    <div id="carouselExampleSlidesOnly" class=" mb-3 carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="..\images\banner02.png" alt="First slide">
            </div>
        </div>
    </div>

    <section class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="card bg-light mx-3 shadow p-3 mb-5 bg-white rounded" style="width: 18rem;">
                <img src="{{ asset($product->image) }}" class="card-img-top">

                    <h5 class="card-title text-center">{{ $product->name }}</h5>

                    <div class="text-center">
                    <p class="card-text">{{$product->description}}</p>
                        <span class="text-muted">R$ {{ number_format($product->price, 2, ',', '.')}}</span>
                    </div>
                    <div class="card-body text-center">
                        <a href="{{ route('show.product', $product->id) }}" class="btn btn-warning btn-sm card-link">Visualizar</a>
                        <form action="{{ route('cart.store', $product->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-dark btn-sm card-link">Comprar</button>
                        </form>
                    </div>
                </div>

            @endforeach

            {{ $products->links()}}
        </div>

    </section>

@endsection


