@extends('adminlte::page')

@section('title_postfix', '| Dashboard')

@section('content_header')
    <h1>Lista de salas</h1>
@stop

@section('content')
    <ul class="list-group list-group-flush">
        @foreach ($userClass as $ucls)
        <a href="{{ route('class.show',  $ucls->id) }}">
            <li class="list-group-item">Sala: <b>{{$ucls->class_number }}</b> | Periudo: <b>{{ Utils::convertPeriod($ucls->period)}}</b></li>
        </a>
        @endforeach
    </ul>
@stop
