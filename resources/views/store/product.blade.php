@extends('layouts.store')
@section('content')
<section>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('serach-category', $product->Category->id) }}">{{$product->Category->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
      </nav>
</section>
<section class="container py-4">
    <div class="row bg-light mx-5 shadow-lg p-4 pb-4 bg-white rounded">
        <div class="col-4 mx-auto text-left shadow-sm p-3 mb-3 bg-light rounded">
            <img src="{{ asset($product->image) }}" class="img-fluid" style="width: 70%">
        </div>
        <div class="mx-auto col-8 text-left">
            <h2 class="text-uppercase h2">{{ $product->name }}</h2>
            <p class="text-muted">{{ $product->description }}</p>
            <div class="text-left">
               <span class="display-6  text-warning">R$</span> <span class="display-4"> {{ number_format($product->price, 2, ',', '.') }}</span>
            </div>
            <div class="d-flex flex-row-reverse ">
                <form action="{{ route('cart.store', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-warning btn-lg ">Comprar</button>
                </form>
            </div>
            <div class="text-center">
                <h3>Tags</h3>
                @foreach($product->Tags as $tag)
                    <a class="btn btn-sm btn-secondary" href="{{ route('serach-tag', $tag->id) }}">{{$tag->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
