@extends('layouts.base')

@section('title', 'Cadastro de vendas')

@section('head')
<script src="Polymer/bower_components/webcomponentsjs/webcomponents-loader.js"></script>
<script src="js/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
<link rel="import" href="Polymer/bower_components/polymer/polymer.html">
<link rel="import" href="Polymer/bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
<link rel="import" href="Polymer/bower_components/paper-listbox/paper-listbox.html">
<link rel="import" href="Polymer/bower_components/paper-item/paper-item.html">
<link rel="import" href="Polymer/bower_components/paper-checkbox/paper-checkbox.html">
<link href="css/registerSales.css" rel="stylesheet" type="text/css"/>
<script src="js/registerSales.js" type="text/javascript"></script>
@endsection

@section('content')
    <div class="selectors">
        <paper-dropdown-menu class="productSelect" label="Produtos">
            <paper-listbox slot="dropdown-content">
                @foreach ($products as $product)
                    <paper-item product_id="{{ $product['id'] }}">{{ $product['name'] }}</paper-item>
                @endforeach
            </paper-listbox>
        </paper-dropdown-menu>
        
        <a class="addProductButton mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Adicionar</a>
    </div>

    <style is="custom-style">
        paper-checkbox.styled {
            align-self: center;
            border: 1px solid var(--paper-blue-200);
            padding: 8px 16px;
            --paper-checkbox-checked-color: var(--paper-blue-500);
            --paper-checkbox-checked-ink-color: var(--paper-blue-500);
            --paper-checkbox-unchecked-color: var(--paper-blue-900);
            --paper-checkbox-unchecked-ink-color: var(--paper-blue-900);
            --paper-checkbox-label-color: var(--paper-blue-500);
            --paper-checkbox-label-spacing: 0;
            --paper-checkbox-margin: 8px 16px 8px 0;
            --paper-checkbox-vertical-align: top;
        }

        paper-checkbox .subtitle {
            display: block;
            font-size: 0.8em;
            margin-top: 2px;
            max-width: 150px;
        }
    </style>
    
    <table class="productsTable mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
          <tr>
            <th class="mdl-data-table__cell--non-numeric">Produto</th>
            <th class="mdl-data-table__cell--non-numeric">Quantidade</th>
            <th class="mdl-data-table__cell--non-numeric">Preço</th>
            <th class="mdl-data-table__cell--non-numeric"></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    <div class="paymentChoices">
        <paper-dropdown-menu class="clientSelect" label="Cliente">
            <paper-listbox slot="dropdown-content">        
                @foreach ($clients as $client)
                <paper-item client_id="{{ $client['id'] }}">{{ $client['name'] }}</paper-item>
                @endforeach
            </paper-listbox>
        </paper-dropdown-menu>
        
        <paper-checkbox checked class="inCash styled">
            À vista
            <span class="subtitle">
                Pago no balcão
            </span>
        </paper-checkbox>

        <paper-checkbox class="paymentSlip styled">
            Débito
            <span class="subtitle">
                Descontado da carteira
            </span>
        </paper-checkbox>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <a class="submit mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Realizar cobrança</a>
    </div>
@endsection
