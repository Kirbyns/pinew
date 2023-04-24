@extends('layouts.app')

@section('content')
<div class="container mt-5 pb-5">
    <table class="table table-striped table-dark">
        <thead>
            <tr class="text-secondary text-lg ">
                <th>ID</th>
                <th>Nome da Categoria</th>
                <th>Quantidade de Produtos na Categoria</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->Products->count() }}
                <td><a class="btn btn-warning" href="{{ route('category.edit', $category->id) }}">Editar</a></td>
                <td><a class="btn btn-danger" href="{{ route('category.destroy', $category->id) }}">Apagar</a></td>
            </tr>
            @endforeach
        <tbody>
    </table>
</div>
@endsection
