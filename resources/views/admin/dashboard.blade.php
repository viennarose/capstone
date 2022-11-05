@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            <h2>Welcome back!</h2>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
          </button>
          <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
        </div>
      </div>
    <hr>
</div>
</div>
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body dashboard-tabs p-0">
          <ul class="nav nav-tabs px-4" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Appointments</a>
            </li>
          </ul>
          <div class="tab-content py-0 px-0">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-flex d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <div class="d-flex m-2 flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Services</small>
                      <h1 class="text-center">{{$totalServices}}</h1>
                      <a href="{{ url('admin/services')}}" class="btn btn-sm bg-info">view</a>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Appointments</small>
                    <h1 class="text-center">{{$totalAppointments}}</h1>
                    <a href="{{ url('admin/appointments')}}" class="btn btn-sm bg-info">view</a>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Testimonies</small>
                    <h1 class="text-center">{{$totalTestimonies}}</h1>
                    <a href="{{ url('admin/testimonies')}}" class="btn btn-sm bg-info">view</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-flex d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Appointments Today</small>
                      <h1 class="text-center">{{$appointmentsToday}}</h1>
                      <h4 class="text-center fs-6">{{$todayDateString}}</h4>
                        <a href="{{ url('admin/appointments')}}" class="btn btn-sm bg-info">view</a>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Appointments This Month</small>
                    <h1 class="text-center">{{$appointmentsThisMonth}}</h1>
                    <h4 class="text-center fs-6">{{$thisMonthString}}</h4>
                    <a href="{{ url('admin/appointments')}}" class="btn btn-sm bg-info">view</a>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Appointments This Year</small>
                    <h1 class="text-center">{{$appointmentsThisYear}}</h1>
                    <h4 class="text-center fs-6">{{$thisYear}}</h4>
                    <a href="{{ url('admin/appointments')}}" class="btn bg-info">view</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
