@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mt-4 mb-4 text-center">
                    <h2>Adicionar Produto</h2>
                    <div class="row justify-content-center">
                        <form action="{{route('product-sale.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="sale_id" value="{{$sale->id}}">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="product">Produto</label>
                                    <select name="product_id" class="form-control">
                                        <option selected>Selecione um produto...</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}"
                                                    name="product_id">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="amount">Quantidade</label>
                                    <input type="number" class="form-control" id="amount" name="amount">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right">Adicionar</button>
                        </form>
                    </div>
                    @if($errors->any())
                    <p class="alert-danger m-2">Preencha os campos</p>
                    @endif
                </div>
                @if(session('message'))
                    <div class="mt-2 mb-2"><p class="alert alert-success">{{session('message')}}</p></div>
                @endif
                <div class="card text-center">
                    <div class="card-header">Venda #{{$sale->id}}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Quantidade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($saleProducts as $product)
                                <tr>
                                    <th scope="row"></th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->pivot->price}}</td>
                                    <td>{{$product->pivot->amount}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <h2>Total R$ {{$sale->total_price}}</h2>
                        <a href="" class="btn btn-lg btn-primary float-right">Gerar PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
