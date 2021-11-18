@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Vendas</div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="alert alert-success">{{session('message')}}</p>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Usuário</th>
                                <th scope="col">Data</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sales as $sale)
                                @php
                                    $saleDate = \Carbon\Carbon::create($sale->created_at);
                                @endphp
                                <tr>
                                    <th scope="row">{{$sale->id}}</th>
                                    <td>{{$sale->user->name}}</td>
                                    <td>{{$saleDate->format('d/m')}}</td>
                                    <td>
                                        <div class="row p-1">
                                            <a href="{{route('sale.show', ['sale' => $sale->id])}}"
                                               class="btn btn-primary ">Visualizar</a>
                                            <form action="{{route('sale.destroy', ['sale' => $sale->id])}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-1">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <form action="{{route('sale.store')}}" method="post">
                                @csrf
                                    <button type="submit" class="btn btn-lg btn-success">Nova Venda</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
