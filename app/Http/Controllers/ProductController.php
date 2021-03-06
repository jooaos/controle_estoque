<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateQuantityProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @param  App\Http\Requests\StoreProductRequest  $request
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
            return redirect('products')->with('negative-status', 'O produto n??o foi encontrado! Tente novamente.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateProductRequest  $request
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
            return redirect('products')->with('negative-status', 'N??o foi poss??vel atualizar o produto!');
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
            $product->removeBy = 'sistema';
            $product->save();
            $product->delete();
            return redirect('products')->with('positive-status', 'Produto exclu??do com suceso!');
        } catch (Exception $e) {
            return redirect('products')->with('negative-status', 'N??o foi poss??vel excluir o produto, tente novamente!');
        }
    }

    /**
     * Met??do para visualizar a p??gina de edi????o de estoque
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function viewEditInventory($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('product.product-update-inventory', [
                'product' => $product
            ]);
        } catch (Exception $e) {
            return redirect('products')->with('negative-status', 'Recarregue a p??gina e tente novamente');
        }
    }

    /**
     * Met??do para editar a quantidade de produto em estoque
     *
     * @param  App\Http\Requests\UpdateQuantityProductRequest  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editInventory(UpdateQuantityProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($request->quantitySend > $product->quantity) {
                return redirect('products')->with('negative-status', 'Voc?? n??o tem estoque o suficiente para essa baixa');
            }
            $product->quantity =  $request->quantity - $request->quantitySend;
            $product->save();
            return redirect('products')->with('positive-status', 'Estoque atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect('products')->with('negative-status', 'Recarregue a p??gina e tente novamente');
        }
    }
}
