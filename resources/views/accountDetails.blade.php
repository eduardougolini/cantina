@extends('layouts.base')

@section('title', 'Seus dados')

@section('head')
    <link href="css/accountDetails.css" rel="stylesheet" type="text/css"/>
@endsection

@section('sidebar')
    @parent
@endsection
        
@section('content')
<div class="itens left">
    <dl>
        <dt>Nome</dt>
        <dt>Data de Nascimento</dt>
        <dt>Saldo</dt>
        <dt>Telefone</dt>
        <dt>Email</dt>
        <dt>CPF</dt>
        <dt>RG</dt>
        <dt>Nome do Responsável</dt>
        <dt>Rua</dt>
        <dt>Cidade</dt>
        <dt>Estado</dt>  
    </dl>
</div>

<div class="itens">
    <dl>
        <dd>{{ $user->getName() }}</dd>
        <dd>{{ $user->getBirth() }}</dd>
        <dd></dd>
        <dd>{{ $user->getPhone() }}</dd>
        <dd>{{ $user->getEmail() }}</dd>
        <dd>{{ $user->getCpf() }}</dd>
        <dd>{{ $user->getRg() }}</dd>
        <dd></dd>
        <dd></dd>
        <dd></dd>
        <dd></dd>
    </dl>
</div>
@endsection