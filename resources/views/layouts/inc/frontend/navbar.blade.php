<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #ffffff; opacity: 0.8">
    <div class="container-fluid">
        <img src="{{url('../images/logo-somosot.png')}}" alt="" class="img-fluid" style="width: 50px; height:50px">
      <a class="navbar-brand" style="font-family: Comic Sans MS" href="{{url('/')}}">{{$webSetting->website_name ?? 'Somosot Dental Site'}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse m-2 justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link fs-5 mx-2 fw-light"  aria-current="page" href="{{url('/')}}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fs-5 mx-2 fw-light" href="{{ url('/services')}}">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 mx-2 fw-light" href="{{ url('/contact')}}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5 mx-2 fw-light" href="{{ url('/about')}}">About Us</a>
          </li>
    <div class="d-grid gap-3 d-md-flex">
        <li class="nav-item">
            <a class="nav-link btn btn-outline-info rounded-pill fs-6 fw-bold p-2" href="{{ url('/set-appointment')}}">BOOK AN APPOINTMENT</a>
        </li>
        <li class="nav-item">
            <a style="font-size: 10px" class="nav-link btn btn-sm rounded-pill btn-outline-danger mt-1 p-2" href="{{ url('/cancel-appointment')}}">Cancel Appointment</a>
        </li>
    </div>
        </ul>
      </div>
    </div>
</nav>
