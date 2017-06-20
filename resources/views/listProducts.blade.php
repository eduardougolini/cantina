@extends('layouts.base')

@section('title', 'Cadastro de Produtos')

@section('head')
    <link href="css/listProducts.css" rel="stylesheet" type="text/css"/>
@endsection
        
@section('sidebar')
    @parent
@endsection

@section('content')
    <span class="_token" hidden>{{ csrf_token() }}</span>
    <div class="tableBox">
        <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Produto</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Fornecedor</th>
                    <th>Data de entrada</th>
                    <th>Data de validade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="provider" provider_id="{{ $product['id'] }}">
                    <td class="mdl-data-table__cell--non-numeric">{{ $product['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['value'] }}</td>
                    <td>{{ $product['amount'] }}</td>
                    <td>{{ $product['providerName'] }}</td>
                    <td>{{ $product['dateEntry']->format('d/m/Y') }}</td>
                    <td>{{ $product['validity']->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <button class="addButton mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
        <a class="material-icons" href="{{ URL::route('registerProduct') }}">add</a>
    </button>
    <button class="deleteButton mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-color--red-500">
        <i class="material-icons">delete</i>
    </button>
@endsection
