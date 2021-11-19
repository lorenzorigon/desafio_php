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
</div>
