@extends('layouts.store')
@section('content')
<section class="container mt-5">
    <div class="row">
        <div class="col-4">
            <h2>Detalhes do Endereço</h2>
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                {{-- bloco conjunto de validação, o de baixo ficou mais bonito, por isso comentei esse
                     @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                --}}
                <div class="form-group">
                    <label for="zipcode">CEP</label>
                    <input type="text" class="form-control @error('zipcode') is-invalid @enderror"  name="zipcode"  placeholder="CEP (xxxxxxxx)">
                    @error('zipcode')
                    <div class="invalid-feedback">
                       {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Endereco</label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address"  placeholder="Endereço">
                      @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                     @enderror

                </div>
                <div class="form-group">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"  placeholder="Cidade">
                    @error('city')
                    <div class="invalid-feedback">
                         {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control  @error('state') is-invalid @enderror" name="state"   placeholder="Estado">
                    @error('state')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-dark my-2 float-end">Comprar</button>
            </form>
        </div>
        <div class="col-8">
            <h2>Detalhes dos Produtos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>foto</th>
                        <th>Produto</th>
                        <th>Preço Unidade</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                <?php $total = 0.0 ?>
                @foreach($itens as $item)
                <tr>
                    <td> <img src="{{$item->Product->image}}" alt=""></td>
                    <td>{{$item->Product->name}}</td>
                    <td> R$ {{number_format($item->Product->price, 2, ',', '.')}}</td>
                    <td>
                        <form action="{{ route('cart.store', $item->Product->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">+</button>
                        </form>
                        {{$item->units}}
                        <form action="{{ route('cart.destroy', $item->Product->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">-</button>
                        </form>
                    </td>
                </tr>
                <?php  number_format($total += $item->Product->price * $item->units, 2, ',', '.')  ?>
            @endforeach
                <tr>
                    <td class="fw-bold">Total</td>
                    <td class="fw-bold">R$ {{ number_format($total,2) }}</td> <!---formatação numerica-->
                    <td></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
</section>
@endsection
