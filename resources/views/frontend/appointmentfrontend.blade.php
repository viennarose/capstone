@extends('layouts.app')
@section('title', 'Set Appointment')
@section('content')

<div class="row" style="background-image: url('/images/16154.jpg'); background-repeat:no-repeat; background-size: cover;">
    <div class="col-md-5 m-5 mx-auto">
            <div class="card">
                <livewire:frontend.appointment-frontend>
            </div>
    </div>
</div>
@endsection

@section('script')


<script>
    jQuery.datetimepicker.setDateFormatter('moment')
    $('#picker').datetimepicker({
        timepicker: true,
        datepicker:true,
        //format:'LL LT',
        format: 'YYYY-MM-DD H:mm',
        hours12: false,
        step: 30,
        disabledWeekDays:[6, 0],
        todayBtn: true,
        minTime:'8:00',
        maxTime:'17:00',
        minDate: new Date(),
        todayButton:true,
        scrollTime:true,
        minDateTime:true,
        //minDateTime:now()->addHours(3),
        //defaultDate: moment().add(4,'days'),
        //disabledDates: ['2015-08-25', '2015-08-26'],

        //timeHeightInTimePicker: 25,

    })
    $('#toggle').on('click', function(){
        $('#picker').datetimepicker('toggle')
    })
    $('#picker').on("change.datetimepicker", function (e){
        let date = $(this).data('appointmentdate');
        //console.log(date);
        eval(date).set('schedule', $('#appointmentSched').val());

    })
</script>


@endsection
