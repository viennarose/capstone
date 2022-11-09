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
                    <a data-bs-toggle="modal" data-bs-target="#appointmentModal" class="ms-auto mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </a>
                </div>
                <div class="d-flex mt-3 mx-auto input-group">
                    <div class="col-md-3 mt-3 ms-5">
                        <select class="form-select mt-1" name="services_id" wire:model="service">
                            <option value="all">All Services</option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->service_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="ms-3">From:</label>
                        <input type="date" wire:model="fromDate" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label class="ms-3">To:</label>
                        <input type="date" wire:model="toDate" class="form-control">
                    </div>
                    <div class="col-md-4 d-flex form-group mt-3 ms-3 border">
                    <input type="search" wire:model="search" class="form-control float-end" placeholder="Search..." />
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
                            {{-- @if($schedule == \Carbon\Carbon::now()->addDays(1)) --}}
                            @forelse ($appointments as $appointment)

                                <tr>
                                    <td>{{ $appointment->id }}</td>
                                    <td>{{ $appointment->firstName}} {{$appointment->lastName }}</td>
                                    <td>{{ $appointment->email }}</td>
                                    <td>{{ $appointment->services_type }}</td>
                                    <td>{{ $appointment->contact }}</td>
                                    <td>{{ \Carbon\Carbon::parse($appointment->schedule)->format('M j, Y h:i a')}}</td>
                                    <td>{{ $appointment->refNum }}</td>
                                    <td>
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#updateAppointmentModal" wire:click="editAppointment({{$appointment->id}})">
                                            <i class="bi bi-pencil-square" style="color:rgb(0, 81, 255);"></i>
                                        </a>
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#deleteAppointmentModal" wire:click="deleteAppointment({{$appointment->id}})">
                                            <i class="bi bi-trash3" style="color:red;"></i>
                                        </a>
                                        {{-- <button wire:click="export">
                                            Download File
                                        </button> --}}
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                            @endforelse
                            {{-- @endif --}}
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
