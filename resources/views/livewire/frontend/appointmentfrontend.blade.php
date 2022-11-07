<div>
    @if ($currentStep == 1)
    <div class="card border-0">
        <div wire:loading wire:target='increaseStep'>
            <div style="display:flex; justify-content:center;
            align-items:center; background-color:rgb(255, 255, 255); width:100%;
            position:fixed; top: 10px; left:0px; z-index:9999; height:100%; opacity: .15;">
                <div style="color: #00eeff" class="la-ball-spin-clockwise la-2x">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <p class="align-center mt-2">Checking Availability</p>
            </div>
        </div>
        <div class="card-header bg-info">
            <h3 class="text-center text-white" style="font-family: Garamond">Set Appointment</h3>
            <h6 class="text-center" style="font-family: Brush Script MT; font-style:italic">When do you want come?</h6>
        </div>
        <div class="card-body">
            {{-- Step 3: Preferred Service and Schedule --}}
            <div class="row">
                <div class="col-md-6 form-control border-0">
                    <div class="form-floating mb-4">
                        <select class="form-select" name="services_id" wire:model.defer="services_id">
                            <option selected>Select service</option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->service_type}}</option>
                            @endforeach
                        </select>

                        <label for="services_id">Service</label>
                        @error('services_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-1">

                        <label class="fw-light">Select a day and a time</label>
                        <div class="input-group" id="appointmentSched">
                            <div class="input-group-prepend">
                                <button type="button" id="toggle" class="input-group-text">
                                    <i class="bi bi-calendar2-week"></i>
                                </button>
                            </div>
                            <input wire:model.defer="schedule" type="text" class="form-control" data-appointmentdate="@this" id="picker" onchange='Livewire.emit("selectDate", this.value)'>
                        </div>
                        @error('schedule') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div wire:loading.delay wire:target="increaseStep">
                        Checking Availability
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    @endif



    @if ($currentStep == 2)

    <div class="card border-0">
        <div class="card-header bg-info">
            <h3 class="text-center text-white" style="font-family: Garamond">Contact Information</h3>
            <h6 class="text-center" style="font-family: Brush Script MT; font-style:italic">How can we contact you?</h6>
        </div>
        <div class="card-body">
            {{-- Step 2: Contact Details --}}
            <div class="row">
                <div class="col-md-6 form-control border-0">
                    <div class="mb-3">
                        <label class="fw-light">Contact Number</label>
                        <input type="number" class="form-control" wire:model="contact">
                        @error('contact') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-1">
                        <label class="fw-light">Email</label>
                        <input type="email" class="form-control" wire:model="email">
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

    @if ($currentStep == 3)
    <div class="card border-0">
        <div class="card-header bg-info">
            <h3 class="text-center text-white" style="font-family: Garamond">Personal Information</h3>
            <h6 class="text-center" style="font-family: Brush Script MT; font-style:italic">May we know you?</h6>
        </div>

        <div class="card-body">
            {{-- Step 1 : Personal Details --}}
        <div class="row">
            <div class="col-md-6 form-control border-0">
                <div class="mb-2">
                    <label>First Name</label>
                    <input type="text" class="form-control" wire:model="firstName">
                    @error('firstName') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-1">
                    <label>Last Name</label>
                    <input type="text" class="form-control" wire:model="lastName">
                    @error('lastName') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div wire:loading wire:target='setAppointment'>
                    <div style="display:flex; justify-content:center;
                    align-items:center; background-color:rgb(255, 255, 255); width:100%;
                    position:fixed; top: 10px; left:0px; z-index:9999; height:100%; opacity: .15;">
                        <div style="color: #00eeff" class="la-ball-spin-clockwise la-2x">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <p class="align-center mt-2">Saving information</p>
                    </div>
                </div>
            </div>

            {{-- <div wire:loading.delay wire:target="setAppointment">
                Setting Appointment
            </div> --}}
        </div>
        </div>
    </div>

    @endif
    @if ($currentStep == 4)
    <div class="card border-0">
        <div class="card-header bg-info">
            <h3 class="text-center text-white" style="font-family: Garamond">Appointment Information</h3>
            <h6 class="text-center" style="font-family: Brush Script MT; font-style:italic">If the information is correct, proceed to setting your appointment.</h6>
        </div>

        <div class="card-body p-3">
            {{-- Step 1 : Personal Details --}}
        <div class="row mx-auto border">
            <div class="col-md-6 form-control border-0">
                <div class="mb-2 d-flex text-center">
                    <h6 class="fw-light">Name: </h6>
                    <p class="fw-light">&nbsp; {{$firstName}} {{$lastName}}</p>
                </div>

                <div class="text-center">
                    <h6 class="fw-bold">Schedule: </h6>
                    <p>{{ \Carbon\Carbon::parse($schedule)->format('F j, Y h:i a')}}</p>
                </div>
                <div wire:loading wire:target='setAppointment'>
                    <div style="display:flex; justify-content:center;
                    align-items:center; background-color:rgb(255, 255, 255); width:100%;
                    position:fixed; top: 10px; left:0px; z-index:9999; height:100%; opacity: .15;">
                        <div style="color: #00eeff" class="la-ball-spin-clockwise la-2x">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <p class="align-center mt-2">Setting Appointment</p>
                    </div>
                </div>
            </div>

            {{-- <div wire:loading.delay wire:target="setAppointment">
                Setting Appointment
            </div> --}}
        </div>
        </div>
    </div>

    @endif

    <div class="modal-footer d-flex justify-content-between m-auto p-4">

        @if ($currentStep == 1)
            <div></div>
        @endif

        @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
            <button type="button" class="btn btn-secondary ms-2" wire:click="decreaseStep()">Back</button>
        @endif

        @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
            <button type="button" class="btn btn-info ms-auto" wire:click="increaseStep()">Next</button>
        @endif

        @if ($currentStep == 4)
        <button type="button" class="btn btn-info ms-auto" wire:click="setAppointment()">Set Appointment</button>
        @endif


    </div>


</div>
