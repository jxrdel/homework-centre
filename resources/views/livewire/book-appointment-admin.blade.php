
@php
use Carbon\Carbon;

// Assuming $startdate is passed to the view in Ymd format (e.g., 20241230)
$formattedDate = Carbon::createFromFormat('Ymd', $this->date)->format('F jS, Y');
@endphp
<div>

    @include('livewire.create-booking-modal')
    @if ($isCurrent)
        <div class="row">
            <a type="button" data-bs-toggle="modal" data-bs-target="#createAppointmentModal" class="btn btn-primary btn-icon-split" style="width: 15rem;margin:auto">
                <span class="icon text-white-50">
                    <i class="fas fa-plus" style="color: white"></i>
                </span>
                <span class="text"  style="width: 200px;">Book Appointment</span>
            </a>
        </div>
    @endif

    <div class="row" style="margin-top: 30px">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 style="text-align: center" class="m-0 font-weight-bold text-primary">Appointments - {{$formattedDate}}</h6>
                </div>
                <div class="card-body">
                    
    <div  style="width: 85%;position: relative;display: inline-block;margin-left:50px;margin-bottom:20px;margin-top:10px">
		<input style="color: black" wire:model.live="search" autocomplete="off" id="searchBox" type="text" class="form-control p-2 bg-primary-border border border-2 border-primary" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" autofocus>
		<a style="position: absolute;right: 60px;transform: translateY(-120%);" onmouseover="this.style.cursor='pointer'" wire:click="clearInput"><i class="bi bi-x-lg"></i></a>
		<button class="btn btn-primary" style="border-top-left-radius: 1px;border-bottom-left-radius: 1px;position: absolute;right: 0px;transform: translateY(-100%);height:38px;cursor:default"><i class="bi bi-search" disabled></i></button>
    </div>
                    @forelse ($appointments as $student)
                    {{-- Display student if they have an appointment for this day --}}
                    @if (count($student->appointments) > 0)
                        <div class="row">
                            <div class="card" style="max-width: 100%;margin-top:10px; padding-left:20px;min-height:180px;border">
                                <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="" style="display: flex; justify-content: center; align-items: center;height: 180px;">
                                        <img style="max-height: 140px;width:auto;" src="{{ Storage::url($student->PicturePath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$student->FirstName}} {{$student->LastName}}</h5>
                                        @foreach ($student->appointments as $appointment)
                                            <p class="card-text">
                                                <div class="row">
                                                    <div class="col-6">
                                                        {{ \Carbon\Carbon::parse($appointment->timeslot->StartTime)->format('g:i A')}} - {{ \Carbon\Carbon::parse($appointment->timeslot->EndTime)->format('g:i A')}}
                                                    </div>
                                                    @if ($isCurrent)
                                                    <div class="col">
                                                        <a class="btn btn-danger" wire:click="deleteAppointment({{$appointment->AppointmentID}})">Delete</a>
                                                    </div>
                                                    @else
                                                    <div class="col">
                                                        <p>{{$appointment->Attendance}}</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @empty
                    <p style="text-align: center">No appointments booked for this date</p>
                    @endforelse
                </div>
            </div>
        </div>

        @if ($isCurrent)
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 style="text-align: center" class="m-0 font-weight-bold text-primary">Booking Availability</h6>
                    </div>
                    <div class="card-body">
                        @forelse ($this->timeslots as $class)

                            <div class="card border-left-info h-100 py-2" style="margin-top: 10px">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-info text-uppercase mb-1">
                                                {{ \Carbon\Carbon::parse($class->StartTime)->format('g:i A')}} - {{ \Carbon\Carbon::parse($class->EndTime)->format('g:i A')}} | 
                                                <strong class="text-gray-800">{{$class->bookingsRemaining}}</strong>
                                                &nbsp;<a style="font-size:0.8rem" href="{{route('admin.attendance.class' , ['id' => $class->TimeSlotID])}}" class="btn btn-primary">Take Attendance</a>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$class->remainingPercentage}}%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: {{$class->remainingPercentage}}%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="text-align: center">No Classes for this Date
                        @endforelse
                    </div>
                </div>
            </div>
        @endif
    </div>


</div>
