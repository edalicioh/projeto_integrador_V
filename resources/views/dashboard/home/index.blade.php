@extends('adminlte::page')

@section('title_postfix', '| Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <ul class="list-group list-group-flush">
        @foreach ($userClass as $ucls)
        <a href="{{ route('class.show',  $ucls->id) }}">
            <li class="list-group-item">Sala {{$ucls->class_number }} | Periudo {{$ucls->period}}  </li>
        </a>
        @endforeach
    </ul>
@stop
