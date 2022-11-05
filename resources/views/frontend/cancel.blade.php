@extends('layouts.app')

@section('title', 'Cancellation')

@section('content')
<div class="row" style="background-image: url('/images/16154.jpg'); background-repeat:no-repeat; background-size: cover;">
    <div class="col-md-4 mx-auto m-5" >
            <div class="card">
                <livewire:frontend.cancel-appt>
            </div>
    </div>
</div>
@endsection
@section('script')
    <script>
    window.addEventListener('close-modal', event => {
        $('#appointmentModal').modal('hide');
        $('#updateAppointmentModal').modal('hide');
        $('#deleteAppointmentModal').modal('hide');
    });
    </script>
@endsection
