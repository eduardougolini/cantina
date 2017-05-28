@extends('layouts.base')

@section('title', 'Seus dados')

@section('head')
    <link href="css/accountDetails.css" rel="stylesheet" type="text/css"/>
@endsection

@section('sidebar')
    @parent
@endsection
        
@section('content')
    <table class=" accountDetails mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
            <tr>
                <th class="mdl-data-table__cell--non-numeric">Nome</th>
                <th class="mdl-data-table__cell--non-numeric">Data de Nascimento</th>
                <th class="mdl-data-table__cell--non-numeric">Saldo</th>
                <th class="mdl-data-table__cell--non-numeric">Telefone</th>
                <th class="mdl-data-table__cell--non-numeric">Email</th>
                <th class="mdl-data-table__cell--non-numeric">CPF</th>
                <th class="mdl-data-table__cell--non-numeric">RG</th>
                <th class="mdl-data-table__cell--non-numeric">Nome do Responsável</th>
                <th class="mdl-data-table__cell--non-numeric">Rua</th>
                <th class="mdl-data-table__cell--non-numeric">Cidade</th>
                <th class="mdl-data-table__cell--non-numeric">Estado</th>  
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="mdl-data-table__cell--non-numeric">{{ $user->getName() }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ $user->getBirth() }}</td>
                <td class="mdl-data-table__cell--non-numeric"></td>
                <td class="mdl-data-table__cell--non-numeric">{{ $user->getFone() }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ $user->getEmail() }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ $user->getCpf() }}</td>
                <td class="mdl-data-table__cell--non-numeric">{{ $user->getRg() }}</td>
            </tr>
        </tbody>
    </table>
@endsection