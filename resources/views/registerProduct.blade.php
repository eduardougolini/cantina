
@extends('layouts.base')

@section('title', 'Registro de produtos')
@section('head')
    <link href="css/registerProduct.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <form class="registro">
          <div class="name mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="sample3">
            <label class="mdl-textfield__label" for="sample3">Nome...</label>
          </div>
          <div class="description name mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="sample3">
            <label class="mdl-textfield__label" for="sample3">Descrição...</label>
          </div>
           <div class="value mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="value" id="sample3">
            <label class="mdl-textfield__label" for="sample3">Valor...</label>
          </div>
        <input class="expirationDate" name="expirationDate" type="date" value="Validade"/>
        <input class="picture" name="picture" type="file" accept="image/*"/>
        <a class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">Cadastrar</a>
    </form>
@endsection