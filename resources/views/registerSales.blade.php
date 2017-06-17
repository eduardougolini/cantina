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
    @parent
@endsection

@section('content')

<paper-dropdown-menu label="Cliente">
    <paper-listbox slot="dropdown-content" selected="1">        
        @foreach ($clients as $client)
           <paper-item user_id="{{ $client['id'] }}">{{ $client['name'] }}</paper-item>
        @endforeach
    </paper-listbox>
</paper-dropdown-menu>

<paper-dropdown-menu label="Produtos">
    <paper-listbox slot="dropdown-content" selected="0">
        @foreach ($products as $product)
           <paper-item product_id="{{ $product['id'] }}">{{ $product['name'] }}</paper-item>
        @endforeach
    </paper-listbox>
</paper-dropdown-menu>
@endsection
