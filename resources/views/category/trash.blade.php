@extends('layouts.app')

@section('content')
<div class="container mt-5 pb-5">
    <table class="table table-striped table-dark">
        <thead>
            <tr class="text-secondary">
                <th>ID</th>
                <th>Nome da Categoria</th>
                <th>Quantidade de Produtos na Categoria</th>
                <th>Restaurar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->Products->count() }}
                <td><a class="btn btn-success" href="{{ route('category.restore', $category->id) }}">Restaurar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
