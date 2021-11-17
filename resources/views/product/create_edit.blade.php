@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('message'))
                    <p class="alert alert-success">{{session('message')}}</p>
                @endif
                <div class="card">

                    @if(isset($product))
                        <div class="card-header text-uppercase text-center">Editar Produto</div>
                        <div class="card-body">
                            <form action="{{route('product.update', ['product' =>$product->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                    @else
                        <div class="card-header text-uppercase text-center">Cadastrar Produto</div>
                        <div class="card-body">
                            <form action="{{route('product.store')}}" method="post">
                                @csrf
                    @endif

                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="{{isset($product) ? $product->name : ''}}" value="{{isset($product) ? $product->name : ''}}">
                            </div>
                            @error('name')
                                <p class="alert alert-danger">Preencha o nome!</p>
                            @enderror

                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="{{isset($product) ? $product->description : ''}}" value="{{isset($product) ? $product->description : ''}}">
                            </div>

                            @error('description')
                            <p class="alert alert-danger">Preencha a descrição!</p>
                            @enderror

                            <div class="form-group">
                                <label for="price">Preço</label>
                                <input type="number" class="form-control" id="price" name="price"
                                       placeholder="{{isset($product) ? $product->price : ''}}" value="{{isset($product) ? $product->price : ''}}">
                            </div>

                            @error('price')
                            <p class="alert alert-danger">Preencha o preço!</p>
                            @enderror

                                <button type="submit" class="btn btn-lg btn-success">Cadastrar</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
