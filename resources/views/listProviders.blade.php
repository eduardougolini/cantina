@extends('layouts.base')

@section('title', 'Listagem de fornecedores')

@section('head')
    <script src="js/vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
    <link href="css/listProviders.css" rel="stylesheet" type="text/css"/>
    <script src="js/listProviders.js" type="text/javascript"></script>
@endsection
        
@section('sidebar')
    @parent
@endsection

@section('content')
    <span class="_token" hidden>{{ csrf_token() }}</span>
    <div class="tableBox">
        <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
            <thead>
              <tr>
                <th class="mdl-data-table__cell--non-numeric">Fornecedor</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>CEP</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($providers as $provider)
                    <tr class="provider" provider_id="{{ $provider['id'] }}">
                      <td class="mdl-data-table__cell--non-numeric">{{ $provider['name'] }}</td>
                      <td>{{ $provider['email'] }}</td>
                      <td>{{ $provider['phone'] }}</td>
                      <td>{{ $provider['cep'] }}</td>
                      <td>{{ $provider['street'] }}</td>
                      <td>{{ $provider['number'] }}</td>
                      <td>{{ $provider['district'] }}</td>
                      <td>{{ $provider['city'] }}</td>
                      <td>{{ $provider['state'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
  <button class="deleteButton mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-color--red-500">
    <i class="material-icons">delete</i>
  </button>

@endsection