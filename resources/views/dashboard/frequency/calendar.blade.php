@extends('adminlte::page')

@section('title_postfix', '| Dashboard')


@section('content_header')
    <h1 class="d-flex">
        <a href="javascript:history.back()" ><span class="d-md-none" style="padding: 0 10px;"><i class="fas fa-chevron-left"></i></span></a>

    </h1>
@stop


@section('content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-body p-0">

                    <div id='calendar'></div>
                </div>
            </div>
        </div>

    </div>
    @include('dashboard.frequency.components.charts')
    @csrf
@stop


@section('js')
    <script>
        const classesId = {{ $classesId }}
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                initialView: 'dayGridMonth',

                height: $(window).height() * 0.83

            });
            calendar.render();
            getClickCaledar(calendar)
        })

        const getClickCaledar = (calendar) => {
            calendar.el.addEventListener('click', e => {
                const td = e.target.closest('td .fc-daygrid-day')
                if (!td) return
                const dateClicked = td.dataset.date
                getFrequencyByDate(dateClicked)
            })
        }
        const getFrequencyByDate = async (date) => {
            const token = document.querySelector('[name="_token"]').value

            const res = await fetch('{{ route('frequency.date') }}', {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    body: JSON.stringify({
                        date,
                        classesId
                    })
                })

            const json = await res.json()

            if (res.status === 200) {
               chart(json)
               document.getElementById('chartLabel').innerHTML = "Dados do dia: " + date
                $('#chart').modal()
            }
        }

        const chart = (data) => {
        var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Presenças', 'Faltas' ],
                datasets: [{
                    data: data,
                     backgroundColor: [
                         '#002400',
                         '#e3342f'
                     ],
                }],
            },
        });
        }



    </script>
@stop
