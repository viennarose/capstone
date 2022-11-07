@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<div class="bg-info p-5 opacity-75">
    <h1 class="text-center">CONTACT US</h1>
</div>
<div class="container">
<div class="row mt-5">
    <div class="col-md-8">
        <h2 class="text-info" style="font-family:'Segoe UI', Tahoma, Verdana">Get In Touch With Us</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, iure, sunt voluptate facilis est necessitatibus in dolor, earum sapiente tempore consequuntur perspiciatis! Quaerat harum, beatae eveniet ea cum unde totam?</p>

        <div class="row mx-auto">
            <div class="bg-info mb-3 me-4 d-flex col-md-3" data-aos="fade-right">
                <div class="mt-4">
                    <i class="bi  bi-geo-alt-fill p-2 rounded-circle bg-white p-2"></i>
                </div>
                <div class="ms-3">
                    <h5 class="mt-3 m-0 fw-bold" style="font-family: 'Times New Roman', Times, serif">Visit Us <br></h5>
                    <p class="fw-lighter text-break" style="font-size:13px;">{{$webSetting->address ?? 'Pooc Oriental, Tubigon, Bohol'}}</p>
                </div>
            </div>
            <div class="bg-info mb-3 me-4 d-flex col-md-4" data-aos="zoom-out">
                <div class="mt-4">
                    <i class="bi bi-envelope-fill p-2 rounded-circle bg-white p-2"></i>
                </div>
                <div class="ms-3">
                    <h5 class="mt-3 m-0 fw-bold" style="font-family: 'Times New Roman', Times, serif">Email Us <br></h5>
                    <p class="fw-lighter text-break" style="font-size:13px;">{{$webSetting->email1}}</p>
                </div>
            </div>
            <div class="bg-info mb-3 d-flex col-md-4" data-aos="fade-left">
                <div class="mt-4">
                    <i class="bi bi-telephone-fill rounded-circle bg-white p-2"></i>
                </div>
                <div class="ms-3">
                    <h5 class="mt-3 m-0 fw-bold" style="font-family: 'Times New Roman', Times, serif">Call/Text Us <br></h5>
                    <p class="fw-lighter text-break" style="font-size:13px;">{{$webSetting->phone1}} / {{$webSetting->phone2}}</p>
                </div>
            </div>
        </div>

        <div class="row bg-info mx-auto" data-aos="fade-right">
            <div class="col-md-2">
                <h5 class="fw-bold mt-4">Get Socials:</h5>
            </div>

            <div class="col-md-4 d-flex mx-auto">
                <i class="bi bi-facebook p-3 mt-2"></i><p class="mt-4">Somosot Dental Bohol</p>
            </div>

            <div class="col-md-4 ms-auto">
                <h6 class="fw-bold">Opening Hours:</h6>
                <p>Monday-Sunday <br>8:00am - 5:00pm</p>
            </div>
        </div>

    </div>
    <div class="col-md-4 mt-3 embed-responsive" data-aos="zoom-in">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d982.4555493890239!2d123.96225372914154!3d9.94874702049384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aa2f70b74d642d%3A0x85a7b25524fc1cc0!2s88%20Santos%20Baura%20St%2C%20Tubigon%2C%206329%20Bohol!5e0!3m2!1sen!2sph!4v1667739953069!5m2!1sen!2sph" width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        {{-- <a href="{{url('https://www.google.com/maps/dir/9.9362302,123.9415511/9.9484559,123.9630103/@9.9412286,123.9351748,14z/data=!3m1!4b1!4m4!4m3!1m1!4e1!1m0')}}"><img src="{{ url('../images/map.png')}}" alt="" class="img-thumbnail img-fluid"></a> --}}
        <a class="btn btn-primary d-block" href="{{url("https://www.google.com/maps/place/88+Santos+Baura+St,+Tubigon,+6329+Bohol/@9.9487936,123.9626889,21z/data=!4m5!3m4!1s0x33aa2f70b74d642d:0x85a7b25524fc1cc0!8m2!3d9.9487457!4d123.9628009")}}">Get Directions</a>
    </div>
</div>
</div>
<div class="container mt-5">
    <h3 class="fw-light text-center pt-5">FREQUENTLY ASKED QUESTIONS</h3>
</div>
<div class="container" data-aos="zoom-out-up">
    @include('frontend.faq')
</div>
@endsection
