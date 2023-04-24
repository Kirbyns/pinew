@extends('layouts.store')
@section('content')
    @foreach($orders as $order)
        <section class="container mt-5  shadow-lg p-3 mb-5 bg-white rounded">
            <div>
                <h2>Pedido: {{ $order->id }}</h2>
                <p>Endereço de entrega: {{ $order->address }}, {{ $order->city }}, {{ $order->state }}, {{ $order->zipcode }}</p>
            </div>
            <table class="table table-striped table-secondary">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0.0 ;  $totalUni = 0 ?>
                    @foreach($order->Products as $product)
                    <tr>
                        <td><img src="{{$product->image}}"> </td>
                        <td  class="align-middle">{{$product->pivot->name}}</td>
                        <td  class="align-middle">{{$product->pivot->units}}</td>
                        <td  class="align-middle">{{ number_format($product->pivot->price * $product->pivot->units, 2, ',', '.')}}</td>
                        <?php  number_format($total += $product->pivot->price * $product->pivot->units, 2, ',', '.') ; $totalUni += $product->pivot->units  ?>
                    </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td  class="fw-bold">Total </td>
                            <td class="fw-bold"> {{$totalUni}} </td> <!---formatação numerica-->
                            <td  class="fw-bold">R$ {{ number_format($total,2) }}</td>
                        </tr>
                </tbody>
            </table>
        </section>
    @endforeach
@endsection
