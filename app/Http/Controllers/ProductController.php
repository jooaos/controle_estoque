<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts = Product::all();
        return view('product.product', [
            'products' => $allProducts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.product-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->quantity = $request->quantity;
        $product->addBy = 'sistema';
        $product->save();
        return redirect('products')->with('positive-status', 'O produto foi criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('product.product-update', [
                'product' => $product
            ]);
        } catch (Exception $e) {
            return redirect('products')->with('negative-status', 'O produto não foi encontrado! Tente novamente.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->quantity = $request->quantity;
            $product->save();
            return redirect('products')->with('positive-status', 'Produto editado com sucesso!');
        } catch (Exception $e) {
            return redirect('products')->with('negative-status', 'Não foi possível atualizar o produto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect('products')->with('positive-status', 'Produto excluído com suceso!');
        } catch (Exception $e) {
            return redirect('products')->with('negative-status', 'Não foi possível excluir o produto, tente novamente!');
        }
    }
}
