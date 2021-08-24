@extends('template.template')

@section('title', 'Relatório')

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Relatório InvtControl</h3>
                <p class="lead">
                    - Acompanhe aqui os principais indicadores da organização. <strong>Data Consultada:
                        {{ $today }}</strong>
                </p>
            </div>
            <div>
                <a href="{{ route('products.index') }}" type="button" class="btn btn-info text-white">
                    Voltar
                </a>
            </div>
        </div>
    </section>


    <section>
        <hr>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h5 class="text-uppercase fw-bold">Quantidade de Produtos cadastrados</h5>
            <h4 class="bg-primary text-white p-2 rounded">{{ $productsCreated->count() }}</h4>
        </div>
        <div class="ml-3">
            <ul>
                <li><strong>{{ $productsAddedByAPI->count() }}</strong> cadastrados por API</li>
                <li><strong>{{ $productsAddedBySystem->count() }}</strong> cadastrados por SISTEMA</li>
            </ul>
            <table class="table table-dark table-striped mt-2">
                <thead>
                    <tr class="d-flex justify-content-center">
                        <th class="col-2">SKU</th>
                        <th class="col-2">Nome</th>
                        <th class="col-2">Quantidade</th>
                        <th class="col-2 text-center">Adicionado Via</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsCreated as $product)
                        <tr class="d-flex justify-content-center">
                            <td class="col-2">{{ $product->sku }}</td>
                            <td class="col-2">{{ $product->name }}</td>
                            <td class="col-2">{{ $product->quantity }}</td>
                            <td class="col-2 text-uppercase text-center">{{ $product->addBy }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h5 class="text-uppercase fw-bold">Quantidade de Produtos deletados</h5>
            <h4 class="bg-primary text-white p-2 rounded">{{ $productsDeleted->count() }}</h4>
        </div>
        <div class="ml-3">
            <ul>
                <li><strong>{{ $productsDeletedByAPI->count() }}</strong> removidos por API</li>
                <li><strong>{{ $productsDeletedBySystem->count() }}</strong> removidos por SISTEMA</li>
            </ul>
            <table class="table table-dark table-striped mt-2">
                <thead>
                    <tr class="d-flex justify-content-center">
                        <th class="col-2">SKU</th>
                        <th class="col-2">Nome</th>
                        <th class="col-2">Quantidade</th>
                        <th class="col-2 text-center">Removido Via</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsDeleted as $product)
                        <tr class="d-flex justify-content-center">
                            <td class="col-2">{{ $product->sku }}</td>
                            <td class="col-2">{{ $product->name }}</td>
                            <td class="col-2">{{ $product->quantity }}</td>
                            <td class="col-2 text-uppercase text-center">{{ $product->removeBy }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h5 class="text-uppercase fw-bold">Produtos que estão com baixo estoque</h5>
            <h4 class="bg-primary text-white p-2 rounded">{{ $productsWithLittleUnits->count() }}</h4>
        </div>
        <div class="ml-3">
            <table class="table table-dark table-striped mt-2">
                <thead>
                    <tr class="d-flex justify-content-center">
                        <th class="col-2">SKU</th>
                        <th class="col-2">Nome</th>
                        <th class="col-2">Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsWithLittleUnits as $product)
                        <tr class="d-flex justify-content-center">
                            <td class="col-2">{{ $product->sku }}</td>
                            <td class="col-2">{{ $product->name }}</td>
                            <td class="col-2">{{ $product->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
