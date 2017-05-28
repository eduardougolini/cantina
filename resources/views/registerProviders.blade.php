@extends('layouts.base')

@section('title', 'Cadastro de fornecedores')

@section('head')
    <link href="css/registerProvider.css" rel="stylesheet" type="text/css"/>
@endsection
        
@section('sidebar')
    @parent
@endsection

@section('content')
    <form class='providersForm'>
        <div class='left'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="name mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class='mdl-textfield__input' type="text" name="name" />
                <label class="mdl-textfield__label" for="name">Nome...</label>
            </div>
            <div class="fone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class='mdl-textfield__input' type="tel" name="fone" />
                <label class="mdl-textfield__label" for="fone">Telefone...</label>
            </div>
            <div class="email mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class='mdl-textfield__input' type="email" name="email" />
                <label class="mdl-textfield__label" for="email">Email...</label>
            </div>
        </div>
        <div class='right'>
            @include('includable.__addressInputs')
        </div>

        <a class="submit mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">Cadastrar</a>
    </form>
@endsection
