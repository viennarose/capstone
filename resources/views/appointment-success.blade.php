@extends('layouts.app')
@section('title', 'Appointment Cancellation')
@section('content')
<div class="row" style="background-image: url('/images/16154.jpg'); background-repeat:no-repeat; background-size: cover;">
    <div class="col-md-5 m-5 mx-auto">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="text-center text-white" style="font-family: Garamond">Set Appointment</h3>
                </div>
                <div class="card-body">
                    <h6 class="text-center" style="font-family: Brush Script MT; font-style:italic">Appointment Confirmation</h6>
                    <div class="">
                        <p class="fw-light">
                        Hello <b>{{ request()->name }}</b>, thank you for setting your appointment with us! Please check your email for more details of your confirmation.
                        </p><hr>
                        <h6>Reference Code:</h6>
                        <p class="fw-bold">{{ request()->refNum}}</p>
                    </div>

                    <a href="/set-appointment" class="btn btn-sm btn-info">Set Another Appointment</a>
                    <a href="/services" class="btn btn-sm btn-info">View Services</a>
                </div>
            </div>
    </div>
</div>
@endsection
