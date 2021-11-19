<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    .card-header{
        border: 1px;
        background-color: #c2c2c2;
        text-align: center;
        width: 100%;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .table{
        width: 100%;
    }

    table th{
        text-align: left;
    }
</style>
<body>
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
        @foreach($sale->products as $product)
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
</div>
</body>
</html>
