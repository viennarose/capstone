<div>
    <div class="row">
        @include('livewire.appointment.create')

        @include('livewire.appointment.edit')
        @include('livewire.appointment.delete')
        <div class="col-md-12">
            @if (session()->has('message'))
                <h5 class="alert alert-sucess text-success">{{ session('message') }}</h5>
            @endif
            <div class="card">
                <div class="card-header bg-info d-flex">
                    <h3 class="text-center fw-bold mt-3" style="font-family: Fantasy;">Appointments</h3>
                    <div class="d-flex ms-auto input-group w-50">
                        <select class="form-select mt-1 ms-2" name="services_id" wire:model.defer="services_id">
                            <option selected>Select service</option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->service_type}}</option>
                            @endforeach
                        </select>
                        <input type="search" wire:model="search" class="form-control float-end mt-1 ms-2" placeholder="Search..." />
                        <span class="input-group-text bg-light mt-1" wire:model="search">
                            <i class="bi bi-search"></i></span>
                        <a data-bs-toggle="modal" data-bs-target="#appointmentModal" class="ms-3 mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-borderd table-sm table-hover">
                        <thead class="text-center table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Contact</th>
                                <th>Appointment Schedule</th>
                                <th>Reference Code</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->firstName}} {{$appointment->lastName }}</td>
                                    <td>{{ $appointment->email }}</td>
                                    <td>{{ $appointment->services_id }}</td>
                                    <td>{{ $appointment->contact }}</td>
                                    <td>{{ $appointment->schedule }}</td>
                                    <td>{{ $appointment->refNum }}</td>
                                    <td>
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#updateAppointmentModal" wire:click="editAppointment({{$appointment->id}})">
                                            <i class="bi bi-pencil-square" style="color:rgb(0, 81, 255);"></i>
                                        </a>
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#deleteAppointmentModal" wire:click="deleteAppointment({{$appointment->id}})">
                                            <i class="bi bi-trash3" style="color:red;"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $appointments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
