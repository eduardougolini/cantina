@extends('layouts.base')

@section('title', 'Listagem de pagamentos')

@section('head')
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
                    <tr class="payment" payment_id="">
                      <td class="mdl-data-table__cell--non-numeric"></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><button class="approveButton mdl-button mdl-js-button mdl-button--fab mdl-button--colored">Aprovar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection