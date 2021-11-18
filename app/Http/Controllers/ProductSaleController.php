<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductSaleController extends Controller
{
    public function store(Request $request){
        $product = Product::query()->find($request->product_id);

        $product->sales()->attach($request->input('sale_id'), [
            'amount' => $request->input('amount'),
            'price' => $product->price
        ]);

        return redirect()->back()->with('message', 'Produto adicionado ao pedido');
    }
}
