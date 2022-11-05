<div>
    <div wire:ignore.self class="modal fade" id="updateAppointmentModal" tabindex="-1" aria-labelledby="updateAppointmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateAppointmentModalLabel">Edit Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateAppointment">
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
                        <input type="datetime-local" class="form-control" wire:model="schedule">
                        @error('schedule') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
