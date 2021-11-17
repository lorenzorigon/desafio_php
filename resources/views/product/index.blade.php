@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Produtos</div>
                    <div class="card-body">
                        @if(session('message'))
                            <p class="alert alert-success">{{session('message')}}</p>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Valor</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <div class="row p-1">
                                            <a href="{{route('product.show', ['product' => $product->id])}}"
                                               class="btn btn-primary ">Visualizar</a>
                                            <a href="{{route('product.edit', ['product' => $product->id])}}"
                                               class="btn btn-success ml-1">Editar</a>
                                            <form action="{{route('product.destroy', ['product' => $product->id])}}" method="post">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
