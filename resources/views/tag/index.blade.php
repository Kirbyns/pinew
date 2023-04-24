@extends('layouts.app')

@section('content')
<div class="container mt-5 pb-5">
    <table class="table table-striped table-dark">
        <thead>
            <tr class="text-secondary" >
                <th>ID</th>
                <th>Nome da Tag</th>
                <th>Quantidade de Produtos</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
                <td>{{$tag->Products->count()}}</td>
                <td><a class="btn btn-warning" href="{{ route('tag.edit', $tag->id) }}">Editar</a></td>
                <td><a class="btn btn-danger" href="{{ route('tag.destroy', $tag->id) }}">Apagar</a></td>
            </tr>
            @endforeach
        <tbody>
    </table>
</div>
@endsection
