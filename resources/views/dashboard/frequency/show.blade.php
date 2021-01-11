
@extends('adminlte::page')

@section('title_postfix', '| Dashboard')

@section('content_header')
    <h1>
        <a href="javascript:history.back()" ><span class="d-md-none" style="padding: 0 10px;"><i class="fas fa-chevron-left"></i></span></a>
        <b>Sala:</b> {{ $class->class_number }} | <b>Periudo:</b> {{ $class->period }}
    </h1>
@stop

@section('content')
    <ul class="list-group list-group-flush">
        @foreach ($students as $student)
            <li class="list-group-item check-student-list" data-id="{{$student->id}}">
                <b>Nome:</b> {{ $student->full_name }}
                <input type="checkbox" id="check-{{$student->id}}" class="form-check-input check-student">
            </li>
        @endforeach
    </ul>
@stop


@section('js')
    <script>
        document.querySelectorAll('.check-student-list').forEach(li => {
            li.addEventListener('click', e => {
                e.preventDefault()
                const id = li.dataset.id
                setCheckbox(id)
            })
        })
        const setCheckbox = (id) => {
            const check = document.getElementById('check-'+id)
          check.checked =  !check.checked
        }



    </script>
@stop
