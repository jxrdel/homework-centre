<div>
    
    @forelse ($students as $student)
    {{-- Display student if they have an appointment for this day --}}
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
                        <p class="card-text">
                            <div class="row">
                                <div class="col">
                                    @foreach ($student->appointments as $appointment)
                                    <input @checked($appointment->Attendance == 'Present') wire:click="setAttendance({{$appointment->AppointmentID}}, 'Present')" value="present" type="radio" class="btn-check" name="options-outlined{{$appointment->AppointmentID}}" id="presentradio{{$appointment->AppointmentID}}" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="presentradio{{$appointment->AppointmentID}}">Present</label>&nbsp;&nbsp;
            
                                    <input  @checked($appointment->Attendance == 'Absent') wire:click="setAttendance({{$appointment->AppointmentID}}, 'Absent')" value="absent" type="radio" class="btn-check" name="options-outlined{{$appointment->AppointmentID}}" id="absentradio{{$appointment->AppointmentID}}" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="absentradio{{$appointment->AppointmentID}}">Absent</label>
                                        {{-- <a class="btn btn-danger" wire:click="deleteAppointment({{$appointment->AppointmentID}})">Delete</a>
                                        <a class="btn btn-danger" wire:click="deleteAppointment({{$appointment->AppointmentID}})">Delete</a> --}}
                                    @endforeach
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @empty
    <p style="text-align: center">No appointments booked for this class</p>
    @endforelse
</div>
