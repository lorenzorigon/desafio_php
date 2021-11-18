<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class ProductSaleController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'product_id' => 'required',
            'sale_id' => 'required',
            'amount' => 'required'
        ], [
            'required' => 'Preencha os campos!'
        ]);

        $product = Product::query()->find($request->product_id);

        $product->sales()->attach($request->input('sale_id'), [
            'amount' => $request->input('amount'),
            'price' => $product->price
        ]);


        $this->updateTotalPrice($request, $product);


        return redirect()->back()->with('message', 'Produto adicionado ao pedido');
    }

    private function updateTotalPrice($request, $product){
        $total_price = $request->input('amount') * $product->price;

        $sale = Sale::where('id', $request->sale_id)->first();
        $sale->total_price += $total_price;

        $sale->save();
    }
}
