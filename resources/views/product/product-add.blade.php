@extends('template.template')

@section('title', 'Adicionar Produto')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Adicionar Produto</h3>
                <p class="lead">
                    - Adicione os produtos para constar em seu estoque
                </p>
            </div>
            <div>
                <a href="{{ route('products.index') }}" type="button" class="btn btn-info text-white">
                    Voltar
                </a>
            </div>
        </div>
        <form action="{{ route('products.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Nome do produto</label>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    id=" nameProduct" value="{{ old('name') }}">
                <div id="nameHelp" class="form-text">Max: 255 caracteres</div>
                @if ($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="skuProduct" class="form-label">Código do Produto</label>
                <input type="text" name="sku" class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}"
                    id="skuProduct" value="{{ old('sku') }}">
                @if ($errors->has('sku'))
                    <div class="invalid-feedback">{{ $errors->first('sku') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="quantityProduct" class="form-label">Quantidade em Estoque</label>
                <input type="number" name="quantity"
                    class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" id="quantityProduct"
                    value="{{ old('quantity') }}">
                @if ($errors->has('quantity'))
                    <div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

    </section>

@endsection
