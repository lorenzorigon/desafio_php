@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header text-uppercase">{{$product->name}}</div>
                    <div class="card-body">
                        <p>{{$product->description}}</p>
                        <p style="font-size: 22px">R$ {{$product->price}}</p>
                    </div>
                    <div class="card-footer text-right">
                        <div class="row justify-content-end mr-4">
                            <a href="{{route('product.edit', ['product' => $product->id])}}"
                               class="btn btn-success ml-1">Editar</a>
                            <form action="{{route('product.destroy', ['product' => $product->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-1">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
