@extends('template.template')

@section('title', 'Produtos')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Produtos</h3>
                <p class="lead">
                    - Aqui você encontra todos os produtos que estão cadastrados em seu sistema
                </p>
            </div>
            <div>
                <a href="{{ route('products.create') }}" class="btn btn-info text-white ml-5">
                    Adicionar Produto
                </a>
            </div>
        </div>
        @if (session('positive-status'))
            <div class="alert alert-success">
                {{ session('positive-status') }}
            </div>
        @endif
        @if (session('negative-status'))
            <div class="alert alert-danger">
                {{ session('negatice-status') }}
            </div>
        @endif
        <table class="table table-dark table-striped mt-2">
            <thead>
                <tr class="d-flex">
                    <th class="col-2">SKU</th>
                    <th class="col-2">Nome</th>
                    <th class="col-2">Quantidade</th>
                    <th class="col-2">Adicionado Via</th>
                    <th class="col-4"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="d-flex">
                        <td class="col-2">{{ $product->sku }}</td>
                        <td class="col-2">{{ $product->name }}</td>
                        <td class="col-2">{{ $product->quantity }}</td>
                        <td class="col-2">{{ $product->addBy }}</td>
                        <td class="col-4">
                            <button type="button" class="btn btn-secondary text-white ml-5">
                                Atualizar Estoque
                            </button>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary text-white ml-5">
                                Editar Produto
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white mr-5">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>

@endsection
