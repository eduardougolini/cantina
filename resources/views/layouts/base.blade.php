<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>Cantina - @yield('title')</title>
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="images/android-desktop.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
        <link href="css/mdl/1.3.0/material_icons_font.css" rel="stylesheet" type="text/css"/>
        <link href="css/mdl/1.3.0/material.cyan-light_blue.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        <style>
            #view-source {
                position: fixed;
                display: block;
                right: 0;
                bottom: 0;
                margin-right: 40px;
                margin-bottom: 40px;
                z-index: 900;
            }
        </style>
        @yield('head')
    </head>
    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            
        @section('sidebar')
            <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">@yield('title')</span>
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                        <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                            <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="text" id="search">
                            <label class="mdl-textfield__label" for="search">Enter your query...</label>
                        </div>
                    </div>
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                        <i class="material-icons">more_vert</i>
                    </button>
                    <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                        <li class="mdl-menu__item">Sobre</li>
                        <li class="mdl-menu__item">Contato</li>
                    </ul>
                </div>
            </header>
            <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
                <header class="demo-drawer-header">
                    <img src="css/images/user.png" class="demo-avatar">
                    <div class="demo-avatar-dropdown">
                        @if (method_exists($user, 'getEmail'))
                            <span>{{ $user->getEmail() }}</span>
                        @else
                            <span>{{ $user->email }}</span>
                        @endif
                        <div class="mdl-layout-spacer"></div>
                        <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                            <i class="material-icons" role="presentation">arrow_drop_down</i>
                            <span class="visuallyhidden">Accounts</span>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                            <li class="mdl-menu__item"><a href="accountDetails">Dados da conta</a></li>
                            <a href="{{ URL::route('logout') }}"><li class="mdl-menu__item">Sair</li></a>
                        </ul>
                    </div>
                </header>
                <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
                    <a class="mdl-navigation__link" href="{{ URL::route('dashboard') }}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Página Principal</a>
                    <a class="mdl-navigation__link" href="{{ URL::route('listProviders') }}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_shipping</i>Fornecedores</a>
                    <a class="mdl-navigation__link" href="{{ URL::route('listProducts') }}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_offer</i>Produtos</a>
                    <a class="mdl-navigation__link" href="{{ URL::route('registerSale') }}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Vendas</a>
                    <a class="mdl-navigation__link" href="{{ URL::route('wallet') }}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">attach_money</i>Carteira</a>
                    <div class="mdl-layout-spacer"></div>
                    <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
                </nav>
            </div>
        @show

            <main class="mdl-layout__content mdl-color--grey-100">
                <div class="mdl-grid demo-content">
                    @yield('content')
                </div>
            </main>
        </div>
        <script src="js/vendor/mdl/1.3.0/material.min.js" type="text/javascript"></script>
    </body>
</html>