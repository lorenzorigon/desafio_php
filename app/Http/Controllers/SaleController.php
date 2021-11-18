<?php

namespace App\Http\Controllers;

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

        return redirect()->route('sale.index');
    }


    public function show($id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
