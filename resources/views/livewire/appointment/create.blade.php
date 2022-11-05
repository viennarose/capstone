<div>
    <div wire:ignore.self class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="appointmentModalLabel">Set New Appointment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>First Name</label>
                        <input type="text" class="form-control" wire:model="firstName">
                        @error('firstName') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" wire:model="lastName">
                        @error('lastName') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Contact Number</label>
                        <input type="number" class="form-control" wire:model="contact">
                        @error('contact') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" wire:model="email">
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-4">

                        <select class="form-select" name="services_id" wire:model.defer="services_id">

                            <option selected>Select service</option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->service_type}}</option>
                            @endforeach
                        </select>

                        <label for="services_id">Appointment Purpose</label>
                        @error('services_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Appointment Schedule</label>
                        <div class="input-group" id="appointmentSched">
                            <div class="input-group-prepend">
                                <button type="button" id="toggle" class="input-group-text">
                                    <i class="bi bi-calendar2-week"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" data-appointmentdate="@this" id="picker" onchange='Livewire.emit("selectDate", this.value)'>
                        </div>
                        @error('schedule') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" wire:click="setAppointment()">Save changes</button>
                </div>
                <div wire:loading wire:target='setAppointment'>
                    <div style="display:flex; justify-content:center;
                    align-items:center; background-color:rgb(223, 207, 207); width:100%;
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
        </div>
      </div>
    </div>

</div>
