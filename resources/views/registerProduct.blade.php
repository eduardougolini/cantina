
@extends('layouts.base')

@section('title', 'Registro de produtos')
@section('head')
    <link href="css/registerProduct.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/registerProduct.js" type="text/javascript"></script>
@endsection

@section('content')
    <form class="register">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="picture hidden" name="picture" type="file" accept="image/*"/>
        <div class='imageInput'>
            <span>+</span>
        </div>
        <div class="name mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" name="name" type="text" />
          <label class="mdl-textfield__label" for="name">Nome...</label>
        </div>
        <div class="description name mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="description" type="text" />
          <label class="mdl-textfield__label" for="description">Descrição...</label>
        </div>
         <div class="value mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" name="value" type="text" />
          <label class="mdl-textfield__label" for="value">Valor...</label>
        </div>
        <!--<input class="expirationDate" name="expirationDate" type="date" value="Validade"/>-->
        <a class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" href="{{ URL::route('registerNewProduct') }}">Cadastrar</a>
    </form>
@endsection