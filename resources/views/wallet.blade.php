@extends('layouts.base')

@section('title', 'Carteira')

@section('head')
    <link href="css/wallet.css" rel="stylesheet" type="text/css"/>
@endsection

@section('sidebar')
    @parent
@endsection
        
@section('content')

<div class="card">
    <div class="demo-card-square mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title mdl-card--expand">
          <h2 class="mdl-card__title-text"><i class="material-icons">account_balance_wallet</i>Carteira</h2>
      </div>
      <div class="mdl-card__supporting-text">
        Seu saldo é 10 reais
      </div>
      <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--lime-900">
          Adicionar Saldo
        </a>
      </div>
    </div>
</div>

<div class="table">
    <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
      <thead>
        <tr>
          <th class="mdl-data-table__cell--non-numeric">Produto</th>
          <th>Data de Compra</th>
          <th>Valor Pago</th>
          <th>Atendente</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="mdl-data-table__cell--non-numeric">Acrylic (Transparent)</td>
          <td>25</td>
          <td>$2.90</td>
          <td>vadgina</td>
        </tr>
        <tr>
          <td class="mdl-data-table__cell--non-numeric">Plywood (Birch)</td>
          <td>50</td>
          <td>$1.25</td>
          <td>vadgina</td>
        </tr>
        <tr>
          <td class="mdl-data-table__cell--non-numeric">Laminate (Gold on Blue)</td>
          <td>10</td>
          <td>$2.35</td>
          <td>vadgina</td>
        </tr>
      </tbody>
    </table>
</div>

@endsection

