@extends('layouts.base')

@section('title', 'Cadastro de vendas')

@section('head')
@endsection
        
@section('sidebar')
    @parent
@endsection

@section('content')
<paper-dropdown-menu label="Dinosaurs">
  <paper-listbox slot="dropdown-content" selected="1">
    <paper-item>allosaurus</paper-item>
    <paper-item>brontosaurus</paper-item>
    <paper-item>carcharodontosaurus</paper-item>
    <paper-item>diplodocus</paper-item>
  </paper-listbox>
</paper-dropdown-menu>
@endsection
