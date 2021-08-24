@extends('template.template')

@section('title', 'Editar Produto')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Editar Produto</h3>
                <p class="lead">
                    - Edite aqui os produtos que constão em seu estoque
                </p>
            </div>
            <div>
                <a href="{{ route('products.index') }}" type="button" class="btn btn-info text-white">
                    Voltar
                </a>
            </div>
        </div>
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Nome do produto</label>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id=" nameProduct" value="{{ $product->name }}" required>
                <div id="nameHelp" class="form-text">Max: 255 caracteres</div>
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="skuProduct" class="form-label">Código do Produto</label>
                <input type="text" name="sku" class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}"
                    id="skuProduct" value="{{ $product->sku }}" readonly>
            </div>
            <div class="mb-3">
                <label for="quantityProduct" class="form-label">Quantidade em Estoque</label>
                <input type="number" name="quantity"
                    class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" id="quantityProduct"
                    value="{{ $product->quantity }}" required>
                @if ($errors->has('quantity'))
                    <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>

    </section>

@endsection
