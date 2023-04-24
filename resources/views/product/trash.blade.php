@extends('layouts.app')

@section('content')

<div class="container mt-5 pb-5">

    <table class="table table-striped table-dark ">
        <thead>
            <tr class="text-secondary text-lg " align="center">
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Cat ID</th>
                <th>Categoria</th>
                <th>Tag</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Restaurar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->Category->id}}</td>
                <td>{{$product->Category->name}}</td>
                <td>@foreach($product->Tags()->get() as $tag)
                {{$tag->name}}
                @endforeach</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td><a class="btn btn-success" href="{{ route('product.restore', $product->id) }}">Restaurar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
