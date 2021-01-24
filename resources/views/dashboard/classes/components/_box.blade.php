<div class="row">
    <div class="col-lg-3 col-6">
        <a href="{{ route('frequency.show', $class->id) }}">

            <div class="small-box-check bg-primary">
                <div class="icon-class">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="inner-class">
                    <h3>Chamada</h3>
                </div>
            </div>

        </a>
    </div>
    <div class="col-lg-3 col-6">
        <a href="{{ route('frequency.calendar', $class->id) }}">

            <div class="small-box-check bg-primary">
                <div class="icon-class">
                   <i class="fas fa-calendar-check"></i>
                </div>
                <div class="inner-class">
                    <h3>Calendário</h3>
                </div>
            </div>

        </a>
    </div>

</div>
