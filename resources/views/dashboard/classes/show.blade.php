@extends('adminlte::page')

@section('title_postfix', '| Dashboard')

@section('content_header')
    <h1><b>Sala:</b> {{ $class->class_number }} | <b>Periudo:</b> {{$class->period}}</h1>
@stop

@section('content')
    <ul class="list-group list-group-flush">
        @foreach ($students as $student)
            <a href="{{ route('class.show', $student->id) }}">
                <li class="list-group-item"><b>Nome:</b> {{ $student->full_name }} <input type="checkbox"
                        class="form-check-input check-student"> </li>
            </a>
        @endforeach
    </ul>
@stop
