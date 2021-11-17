<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::query()->find('id', $id);
        return view('product.show', ['product' => $product]);
    }

    public function create()
    {
        return view('product.create_edit');
    }

    public function store(Request $request)
    {
        $request->validate(Product::rules(), Product::feedback());

        $product = $request->only('name', 'price', 'description');
        Product::query()->create($product);

        return redirect()->back()->with('message', 'Produto cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $product = Product::query()->find('id', $id);
        return view('product.create_edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(Product::rules(), Product::feedback());

        $product = Product::query()->find('id', $id);
        $product->save($request->only('name', 'price', 'description'));

        return redirect()->back()->with('message', 'Produto editado com sucesso!');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with('message', 'Produto deletado com sucesso!');
    }

}
