<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Confirmation</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container row">
        <div class="d-flex">
            <img src="{{url('./images/logo-somosot.png')}}" alt="Somosot Logo">
        <h3>Somosot Dental Clinic</h3>
        </div>

        <div class="col-md-5 m-5 mx-auto">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="text-center text-white fw-bold">Appointment Confirmation</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-center" style="font-family: Brush Script MT; font-style:italic">Appointment Details</h4>
                    <hr>
                    <div class="">
                        <p class="fw-light">
                        Hello <b>{{ $firstName }}</b>, you have successfully set your appointment! Please take note of the following details:
                        </p>
                        <div class="row">
                            <div class="col-md-2">
                                <h3>Reference Code: {{ $refNum}}</h3>
                                <p style="font-style: italic">This will serve as your invoice. Should you want to cancel your appointment, use this code. Please be reminded that you can only cancel your appointment 3 hours before your appointment.</p>
                            </div>
                            <div class="col-md-2">
                                <h3>Appointment Schedule: {{ \Carbon\Carbon::parse($schedule)->format('F j, Y h:i a')}} </h3>
                                <p class="fw-light">Please be at the clinic at least 10 minutes before your scheduled time. Thank you!</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
