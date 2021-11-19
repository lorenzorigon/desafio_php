<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;

class ProductSaleController extends Controller
{
    public function store(Request $request, Sale $sale)
    {

        $request->validate([
            'product_id' => 'required',
            'amount' => 'required'
        ], [
            'required' => 'Preencha os campos!'
        ]);

        /** @var Product $product */
        $product = Product::query()->find($request->product_id);

        $product->sales()->attach($sale->id , [
            'amount' => $request->input('amount'),
            'price' => $product->price
        ]);


        $this->updateTotalPrice($request, $product);


        return redirect()->back()->with('message', 'Produto adicionado ao pedido');
    }

    private function updateTotalPrice(Request $request, Product $product)
    {
        $total_price = $request->input('amount') * $product->price;

        $sale = Sale::where('id', $request->sale_id)->first();
        $sale->total_price += $total_price;

        $sale->save();
    }

    public function export(Sale $sale)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('sale.pdf', ['sale' => $sale]);
        return $pdf->download('VendaX.pdf');
    }

}
