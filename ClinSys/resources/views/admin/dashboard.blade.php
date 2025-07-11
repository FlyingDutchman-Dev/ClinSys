@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - ClinSys</h1>
@stop

@section('content')
    <p>Bem-vindo ao painel do ClinSys, {{ Auth::user()->name }}!</p>
@stop
