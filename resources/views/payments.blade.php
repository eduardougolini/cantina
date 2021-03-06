@extends('layouts.base')

@section('title', 'Listagem de pagamentos')

@section('head')
    <script src="js/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/payments.js" type="text/javascript"></script>
@endsection
        
@section('sidebar')
    @parent
@endsection

@section('content')
    <span class="_token" hidden>{{ csrf_token() }}</span>
    <div class="tableBox" style="margin: auto;">
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width: 50em;">
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric">Cliente</th>
                <th>Valor</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="payment" payment_id="{{ $payment['id'] }}">
                      <td class="mdl-data-table__cell--non-numeric">{{ $payment['name'] }}</td>
                      <td>{{ $payment['value'] }}</td>
                      @if ($payment['paid'])
                        <td>PAGO</td>
                      @else
                        <td><button class="approveButton mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Aprovar</button></td>
                      @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection