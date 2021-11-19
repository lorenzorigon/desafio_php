<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sale::all();
        return view('sale.index', ['sales' => $sales]);
    }


    public function store()
    {
        $sale = new Sale();
        $sale->user_id = auth()->user()->id;
        $sale->save();


        return redirect()->route('sale.show', ['sale' => $sale->id]);
    }


    public function show($id)
    {
        $sale = Sale::query()->where('id', $id)->first();

        $products = Product::all();

        return view ('sale.show', ['sale' => $sale, 'products' => $products]);
    }


    public function destroy($id)
    {
        //
    }
}
