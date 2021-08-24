<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateQuantityProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function storeProduct(StoreProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->quantity = $request->quantity;
        $product->addBy = 'api';
        $product->save();
        return response()->json('O produto foi cadastrado com sucesso', 200);
    }

    public function updateQuantity(UpdateQuantityProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($request->quantitySend > $product->quantity) {
                throw new Exception('Você não tem estoque o suficiente para essa baixa');
            }
            $product->quantity =  $request->quantity - $request->quantitySend;
            $product->save();
            return response()->json('O produto foi cadastrado com sucesso', 200);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
