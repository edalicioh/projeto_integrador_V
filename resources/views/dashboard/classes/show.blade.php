@extends('adminlte::page')

@section('title_postfix', '| Dashboard')

@section('content_header')
    <h1 class="d-flex">
            <a href="javascript:history.back()" ><span class="d-md-none" style="padding: 0 10px;"><i class="fas fa-chevron-left"></i></span></a>

        <div>
            <b>Sala:</b> {{ $class->class_number }} <br>
            <b>Periudo:</b> {{Utils::convertPeriod($class->period) }}
        </div>
    </h1>
@stop

@section('content')
    @include('dashboard.classes.components._box')
@stop


@section('js')
    <script>


    </script>
@stop
