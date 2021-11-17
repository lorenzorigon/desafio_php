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
                        <a href="#" class="btn btn-success">Editar</a>
                        <a href="#" class="btn btn-danger">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
