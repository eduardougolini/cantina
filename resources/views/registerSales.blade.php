@extends('layouts.base')

@section('title', 'Cadastro de vendas')

@section('head')
@endsection
        
@section('sidebar')
    <script src="Polymer/bower_components/webcomponentsjs/webcomponents-lite.js" type="text/javascript"></script>
    <link rel="import" href="Polymer/bower_components/paper-dropdown-menu/paper-dropdown-menu.html">
    <link rel="import" href="Polymer/bower_components/paper-item/paper-item.html">
    <link rel="import" href="Polymer/bower_components/paper-listbox/paper-listbox.html">
    @parent
@endsection

@section('content')

<paper-dropdown-menu label="Cliente">
    <paper-listbox slot="dropdown-content" selected="1">
        <paper-item>allosaurus</paper-item>
        <paper-item>brontosaurus</paper-item>
        <paper-item>carcharodontosaurus</paper-item>
        <paper-item>diplodocus</paper-item>
    </paper-listbox>
</paper-dropdown-menu>

<paper-dropdown-menu label="Produtos">
    <paper-listbox slot="dropdown-content" selected="0">
        @foreach ($products as $product)
           <paper-item>{{ $product->id }}</paper-item>
        @endforeach

    </paper-listbox>
</paper-dropdown-menu>
@endsection
