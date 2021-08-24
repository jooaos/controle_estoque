@extends('template.template')

@section('title', 'Atualizar Estoque')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Atualizar Estoque</h3>
                <p class="lead">
                    - Aqui você pode atualizar o seu estoque de acordo com as suas saídas
                </p>
            </div>
            <div>
                <a href="{{ route('products.index') }}" type="button" class="btn btn-info text-white">
                    Voltar
                </a>
            </div>
        </div>
        <form action="{{ route('products.update.iventory', $product->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Nome do produto</label>
                <input type="text" name="name" class="form-control" id=" nameProduct" value="{{ $product->name }}"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="skuProduct" class="form-label">Código do Produto</label>
                <input type="text" name="sku" class="form-control" id="skuProduct" value="{{ $product->sku }}" readonly>
            </div>
            <div class="mb-3">
                <label for="quantityProduct" class="form-label">Quantidade em Estoque</label>
                <input type="number" name="quantity" class="form-control" id="quantityProduct"
                    value="{{ $product->quantity }}" readonly>
            </div>
            <div class="mb-3">
                <label for="quantitySend" class="form-label">Quantidade de produtos encaminhados para os clientes</label>
                <input type="number" name="quantitySend" class="form-control" id="quantitySend">
            </div>
            <button type=" submit" class="btn btn-primary">Atualizar</button>
        </form>

    </section>

@endsection
