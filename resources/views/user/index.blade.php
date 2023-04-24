@extends('layouts.app')

@section('content')
<a class="btn btn-lg btn-success float-end me-5" href="{{route('product.create')}}">Criar Produto</a>
<div class="container mt-3">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Data de criação</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->create_at}}</td>
                <td>{{$user->role}}</td>
                <td><a href="{{ route('product.edit', $product->id) }}">Editar</a></td>
                <td><a href="{{ route('product.destroy', $product->id) }}">Apagar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
