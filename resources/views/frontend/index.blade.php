@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
    @foreach ($promotions as $key => $promotionItem)

      <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
        <div class="custom-carousel-content">
        @if($promotionItem->image)
            <img src="{{asset('storage')}}/{{$promotionItem->image}}" class="d-block w-100 img-fluid" alt="promotion" style="width:100px; height:450px">
        @endif
        <div class="carousel-caption d-grid gap-2 d-md-block">
            <div class="bg-dark opacity-25 w-50 p-5 mx-auto mb-3">
                <h4 class="text-light"><span>{{$promotionItem->title}}</span></h4>
                <p class="text-white fs-6 text-center">{{$promotionItem->description}}</p>
            </div>

          <a class="btn btn-info" type="button" href="{{url('/set-appointment')}}">Book Appointment</a>
          <a class="btn btn-info" type="button" href="{{url('/services')}}">View services</a>
        </div>
        </div>
      </div>
      @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div data-aos="fade-up"
  data-aos-anchor-placement="top-center">
    <div class="shadow-lg mb-5 p-5" style="background-image: url('/images/16154.jpg'); background-repeat:no-repeat; background-size: cover;">
        <div class="container" >
            @if($images->count() > 0)
                <div class="row g-2" >
                    <div class="col-md-4 d-flex">
                        <div>
                            <h1 class="text-center m-1 fw-bold" style="font-family: fantasy;">SERVICES</h1>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo sequi qui, ea esse tenetur architecto animi officiis corrupti nostrum, odio maxime alias illum voluptatum maiores dolor, facilis veniam explicabo accusantium.</p>
                            <a class="btn btn-info mx-auto float-end" href="{{url('/services')}}">View all services</a>
                        </div>
                    </div>
                @foreach($images as $img)
                <div class="col-md-2" data-aos="fade-left">
                    <div class="card mx-auto shadow-lg">
                        <img class="card-img-top" src="{{asset('storage')}}/{{$img->image}}" alt="">
                        <div class="card-body ">
                            <h4 class="card-title mt-2">{{$img->service_type}}</h3>
                            <p class="" style="font-size: 10px; text-align: justify;">{{$img->description}}</p>
                    </div>
                </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
  </div>
  <div data-aos="zoom-in-up">
    <div class="mb-5">
        <div class="container">
            @if($testimonies->count() > 0)
                <div class="row">
                @foreach($testimonies as $test)
                <div class="col-md-8 d-flex mb-5 mx-auto">
                    <div class="card mx-auto shadow-lg">
                        <h5 class="fw-lighter text-center mt-5">WHAT DO THEY SAY ABOUT US</h5>
                        <div class="card-body ms-2 ps-5">
                            <div class="d-flex">
                                <div class="col-md-8 mt-5">
                                    <h6 class="fst-italic fw-lighter text-justify">"{{$test->message}}" <br>-{{$test->name}}</h6>
                                </div>
                                <div class="col-md-2 mt-5">
                                    <img class="rounded-circle shadow-4-strong img-thumbnail" style="max-width: 100%; height: auto;" src="{{asset('storage')}}/{{$test->image}}" alt="Testimony 1">
                                </div>
                            </div>
                        </div>
                        <div class="ms-auto ps-5 mb-5 mx-auto">
                            <a class="btn btn-outline-info" href="{{url('/about')}}">Get to know us!</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
  </div>


@endsection
