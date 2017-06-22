@extends('layouts.base')

@section('title', 'Página principal')

<body>

    @section('sidebar')
    @parent
    @endsection

    @section('content')
        <style>
            .demo-card-wide.mdl-card {
                width: 512px;
                margin: auto;
            }
            .demo-card-wide > .mdl-card__title {
                color: #fff;
                height: 176px;
                background: url('css/images/ifc.png') center / cover;
            }
            .demo-card-wide > .mdl-card__menu {
                color: #fff;
            }
        </style>

        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
            </div>
            <div class="mdl-card__supporting-text">
                Este projeto tem como objetivo a criação de um sistema para a cantina do IFC - Campus Videira
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="{{ URL::route('aboutUs') }}">
                    Conheça nossa equipe!
                </a>
            </div>
        </div>
    @endsection

</html>
