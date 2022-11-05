
@extends('layouts.app')

@section('title', 'Services')

@section('content')

<div>
    <div class="bg-info p-2 opacity-75">
        <h1 class="text-center p-5">SERVICES</h1>
    </div>
    <div class="shadow-lg" style="background-image: url('/images/16154.jpg'); background-repeat:no-repeat; background-size: cover;">
        <div class="container">
            @if($images->count() > 0)
                <div class="row g-5 ">
                @foreach($images as $img)
                <div class="col" data-aos="zoom-in-up">
                    <div class="card m-2 shadow-lg" style="width: 300px; height:300px">
                        <img class="card-img-top" src="{{asset('storage')}}/{{$img->image}}" alt="">
                    <div class="card-body">
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
@endsection

