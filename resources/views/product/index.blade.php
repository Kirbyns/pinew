@extends('layouts.app')

@section('content')

<div class="container mt-5 pb-5 ">

    <table class="table table-striped table-dark">
        <thead >
            <tr class="text-secondary text-lg " align="center">
                <th>ID</th>
                <th>Image</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Tag</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><img src="{{asset($product->image)}}" style="width:35px; height:35px;"></td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->Category->name}}</td>
                <td>@foreach($product->Tags()->get() as $tag)
                {{$tag->name}}
                @endforeach</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td><a  class="btn btn-warning" href="{{ route('product.edit', $product->id) }}">Editar</a></td>
                <td><a  class="btn btn-danger" href="{{ route('product.destroy', $product->id) }}">Apagar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
