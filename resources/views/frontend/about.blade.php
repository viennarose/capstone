@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div>
<div class="bg-info p-5 opacity-75">
    <h1 class="text-center">ABOUT US</h1>
</div>
<div class="card" data-aos="fade-right" data-aos-duration="1500">
    <div class="row m-5">
        <div class="col-md-4">
            <img src="{{url('./images/owner.jpg')}}" style="width: 100%; height: auto;" alt="Owner">
        </div>
        <div class="col-md-8">
            <h1 class="fw-light">THE OWNER</h1>
            <p>{{$webSetting->about}}</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid sunt ex soluta officia, accusantium voluptates porro esse, debitis laborum placeat aliquam at repudiandae! Quibusdam inventore debitis pariatur quisquam? Iste.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus beatae consequuntur excepturi praesentium accusantium ratione, vel, impedit rem iure sapiente temporibus? Laudantium harum eum accusamus et autem deserunt minus a?</p>
        </div>
    </div>
</div>

<div class="card" data-aos="fade-left" data-aos-duration="1500">
    <div class="row m-5">
    <div class="col-md-8">
        <h1 class="fw-light">THE EMPLOYEES</h1>
        <p>{{$webSetting->about}}</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid sunt ex soluta officia, accusantium voluptates porro esse, debitis laborum placeat aliquam at repudiandae! Quibusdam inventore debitis pariatur quisquam? Iste.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus beatae consequuntur excepturi praesentium accusantium ratione, vel, impedit rem iure sapiente temporibus? Laudantium harum eum accusamus et autem deserunt minus a?</p>
    </div>

    <div class="col-md-4">
        <img src="{{url('./images/employees.jpg')}}" style="width: 100%; height: auto;" alt="Owner">
    </div>
    </div>
</div>
</div>

<div class="card">
    <div class="row m-5">
        <div class="col-md-12">
            <h1 class="fw-light text-center">OUR CLIENTS</h1>
        </div>
        <div class="shadow-lg" style="background-image: url('/images/16154.jpg'); background-repeat:no-repeat; background-size: cover;">
            <div class="container">
                @if($testimonies->count() > 0)
                    <div class="row g-5 mb-5 mt-3">
                    @foreach($testimonies as $test)
                    <div class="col" data-aos="fade-down"
                    data-aos-easing="linear"
                    data-aos-duration="1500">
                        <div class="card m-2 shadow-lg">
                            <img class="float-center shadow-lg rounded-circle w-50 mx-auto" src="{{asset('storage')}}/{{$test->image}}" alt="">
                            <div class="card-body ">
                                <figure class="text-center">
                                    <blockquote class="blockquote">
                                      <p style="font-size: 10px">"{{$test->message}}"</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                      <cite title="Source Title">{{$test->name}}</cite>
                                    </figcaption>
                                </figure>
                        </div>
                    </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

