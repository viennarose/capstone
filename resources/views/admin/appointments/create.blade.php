@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Appointment
                    <a href="{{ url('admin/appointments')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="container">
                    <livewire:appointment.create>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

