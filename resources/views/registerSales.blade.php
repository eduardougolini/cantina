@extends('layouts.base')

@section('title', 'Cadastro de vendas')

@section('head')
@endsection

@section('sidebar')
<script src="Polymer/bower_components/webcomponentsjs/webcomponents-loader.js"></script>
<link rel="import" href="Polymer/bower_components/polymer/polymer.html">
<link rel="import" href="Polymer/bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
<link rel="import" href="Polymer/bower_components/paper-listbox/paper-listbox.html">
<link rel="import" href="Polymer/bower_components/paper-item/paper-item.html">
<link rel="import" href="Polymer/bower_components/paper-checkbox/paper-checkbox.html">
<link href="css/registerSales.css" rel="stylesheet" type="text/css"/>
@parent
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
        
        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Adicionar</a>
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
    
    <div class="productsList"></div>

    <div class="paymentChoices">
        <paper-dropdown-menu class="clientSelect" label="Cliente">
            <paper-listbox slot="dropdown-content">        
                @foreach ($clients as $client)
                <paper-item user_id="{{ $client['id'] }}">{{ $client['name'] }}</paper-item>
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

        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Realizar cobrança</a>
    </div>
@endsection
