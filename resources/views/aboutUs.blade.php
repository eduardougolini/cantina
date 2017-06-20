@php
    $user = Illuminate\Support\Facades\Auth::user();
@endphp

@extends('layouts.base')

@section('title', 'Nós')

@section('head')
@endsection
        
@section('sidebar')
    @parent
@endsection

@section('content')
         <img src="css/images/us.jpg" height="500px" style="margin: auto;" alt=""/>
@endsection
