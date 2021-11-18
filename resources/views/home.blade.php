@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bem vindo {{auth()->user()->name}}</div>

                    <div class="card-body">
                        <div class="row m-1">
                            <a href="{{route('product.create')}}" class="col btn btn-success">Cadastrar Produto</a>
                        </div>
                        <div class="row m-1">
                            <a href="{{route('product.index')}}" class="col btn btn-primary">Visualizar Produtos</a>
                        </div>
                        <form action="{{route('sale.store')}}" method="post">
                            @csrf
                            <div class="row m-1">
                                <button type="submit" class="col btn btn-success">Cadastrar Venda</button>
                            </div>
                        </form>
                        <div class="row m-1">
                            <a href="{{route('product.create')}}" class="col btn btn-primary">Visualizar Vendas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
