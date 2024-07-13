
@php
use Carbon\Carbon;

// Assuming $startdate is passed to the view in Ymd format (e.g., 20241230)
$formattedDate = Carbon::createFromFormat('Ymd', $this->date)->format('F jS, Y');
@endphp
<div>
    @if ($isCurrent)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 style="text-align: center" class="m-0 font-weight-bold text-primary">Book An Appointment</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div style="width: 30%;margin:auto">

                    <div style="color:red; text-align: center;padding:10px">@error('child') {{ $message }} @enderror</div>

                    <select class="form-select @error('child')is-invalid @enderror" wire:model.live="child" required>

                        <option value="">Select a Child</option>
                        @foreach ($children as $child)
                        <option value="{{ $child->StudentID }}">{{ $child->FirstName }} {{ $child->LastName }}</option>
                        @endforeach

                    </select>
                    </div>

                </div>

                @if ($this->child)
                    <div class="row" style="margin-top: 30px">
                        <div style="text-align:center">
                            <p>Select the sessions your child will be attending</p>
                        </div>

                    </div>

                    <div>
                        <table style="margin: auto">
                            @forelse ($classes as $index => $class)
                            <tr>
                                <td>{{$class['StartTime']}} - {{$class['EndTime']}} &nbsp;</td>
                                <td>
                                    <input wire:click="toggleSelected({{$index}})" type="checkbox" class="btn-check" id="btn-check-mc{{$index}}" checked>
                                    <label style="margin-top: 5px" class="btn btn-outline-success" for="btn-check-mc{{$index}}"><i class="bi bi-check-lg"></i></label>
                                </td>
                            </tr>
                            @empty
                            <p style="text-align: center;color:red">There are no classes on this date</p>
                            @endforelse
                        </table>

                        <div class="col" style="margin-left:700px">
                            <button wire:click="save" class="btn btn-primary btn-icon-split" style="width: 8rem;margin:auto">
                                <span class="icon text-white-50">
                                    <i class="bi bi-floppy2-fill" style="color: white"></i>
                                </span>
                                <span class="text"  style="width: 200px;">Save</span>
                            </button>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 style="text-align: center" class="m-0 font-weight-bold text-primary">My Appointments - {{$formattedDate}}</h6>
                </div>
                <div class="card-body">
                    @forelse ($appointments as $student)
                    {{-- Display student if they have an appointment for this day --}}
                    @if (count($student->appointments) > 0)
                        <div class="row">
                            <div class="card" style="max-width: 100%;margin-top:10px; padding-left:20px;min-height:180px;border">
                                <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="" style="display: flex; justify-content: center; align-items: center;height: 180px;">
                                        <img src="{{ Storage::url($student->PicturePath) }}" width="150" height="150" class="img-fluid rounded-start" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$student->FirstName}} {{$student->LastName}}</h5>
                                        @foreach ($student->appointments as $appointment)
                                            <p class="card-text">
                                                {{ \Carbon\Carbon::parse($appointment->timeslot->StartTime)->format('g:i A')}} - {{ \Carbon\Carbon::parse($appointment->timeslot->EndTime)->format('g:i A')}}
                                                @if ($isCurrent)
                                                    <a class="btn btn-danger" wire:click="deleteAppointment({{$appointment->AppointmentID}})">Delete</a></p>
                                                @endif
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
                                            <div class=" font-weight-bold text-info text-uppercase mb-1">{{ \Carbon\Carbon::parse($class->StartTime)->format('g:i A')}} - {{ \Carbon\Carbon::parse($class->EndTime)->format('g:i A')}} | <strong class="text-gray-800">{{$class->bookingsRemaining}}</strong>
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
