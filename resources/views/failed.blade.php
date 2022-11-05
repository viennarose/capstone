@extends('layouts.app')
@section('title', 'Cancellation Failed')
@section('content')
<div class="row" style="background-image: url('/images/16154.jpg'); background-repeat:no-repeat; background-size: cover;">
    <div class="col-md-5 m-5 mx-auto">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="text-center text-white" style="font-family: Garamond">Set Appointment</h3>
                </div>
                <div class="card-body">
                    <h6 class="text-center" style="font-family: Brush Script MT; font-style:italic">Appointment Cancellation Failed</h6>
                    <div class="mx-auto">
                        <h5>Your cancellation details are incorrect. Please make sure your have enter the correct Reference Code.</h5>
                    </div>

                    <a href="/set-appointment" class="btn btn-sm btn-info mx-auto">Set Another Appointment</a>
                    <a href="/services" class="btn btn-sm btn-info mx-auto">View Services</a>
                </div>
            </div>
    </div>
</div>
@endsection
