@extends('layouts.base')

@section('title', 'Carteira')

@section('head')
    <script src="js/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link href="css/wallet.css" rel="stylesheet" type="text/css"/>
    <script src="js/wallet.js" type="text/javascript"></script>
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
                Seu saldo é {{ $account->getBalance() }} reais
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="number" class="value" min="10" value="10"/>
                <a href="{{ URL::route('paymentSlip') }}" class="addBalance mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--lime-900">
                    Adicionar Saldo
                </a>
            </div>
        </div>
    </div>

    <div class="table">
        <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
            <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Id da compra</th>
                    <th>Data de Compra</th>
                    <th>Tipo de Pagamento</th>
                    <th>Valor Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">{{ $transaction->getId() }}</td>
                        <td>{{ $transaction->getDate()->format('d-m-Y') }}</td>
                        <td>{{ $transaction->getType() }}</td>
                        <td>{{ $transaction->getValue() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

