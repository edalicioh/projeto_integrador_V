@extends('adminlte::page')

@section('title_postfix', '| Dashboard')

@section('content_header')
    <h1>

        <a href="javascript:history.back()" ><span class="d-md-none" style="padding: 0 10px;"><i class="fas fa-chevron-left"></i></span></a>
         <b>Sala:</b> {{ $class->class_number }} | <b>Periudo:</b> {{ $class->period }}
    </h1>
@stop

@section('content')
    @include('dashboard.classes.components._box')
@stop


@section('js')
    <script>


    </script>
@stop
