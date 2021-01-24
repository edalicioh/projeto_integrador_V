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

<form action="{{ route('frequency.store') }}" method="post">
    <div class="card">
            <div class="card-body">
            @csrf
            <ul class="list-group list-group-flush">
                @foreach ($students as $index => $student)
                    <li class="list-group-item check-student-list" data-index="{{ $index }}" data-id="{{ $student->id }}">
                        <b>Nome:</b> {{ $student->full_name }}
                        <input type="checkbox" id="check-{{ $student->id }}" class="form-check-input check-student">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <button type="submit" class="btn btn-outline-primary  mb-3">Salvar</button>
    <input type="hidden" name="students" id="students">
</form>


@stop



@section('js')
    <script>
        const students = @json($students);
        const studentsElement = document.getElementById('students')

        document.querySelectorAll('.check-student-list').forEach(li => {
            li.addEventListener('click', e => {
                e.preventDefault()

                setCheckbox(li)
            })
        })
        const setCheckbox = (element) => {
            const id = element.dataset.id
            const index = element.dataset.index
            const check = document.getElementById('check-' + id)
            check.checked = !check.checked
            students[index].presence = check.checked
            setInputStudent()
        }

        const setInputStudent = () => {
            studentsElement.value = JSON.stringify(students)

        }

        setInputStudent()


    </script>
@stop
