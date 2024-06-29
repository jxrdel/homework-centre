<!-- Modal -->
<div wire:ignore.self class="modal fade" id="dateAppointmentModal" tabindex="-1" aria-labelledby="dateAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="dateAppointmentModalLabel" style="color: black">Appointment Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col" style="text-align: center">
                        <label style="margin-top: 5px;" for="title">Appointments on {{ $this->appointmentstart }} - {{ $this->appointmentend }}: &nbsp;</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        @if (count($appointments) < 1)
                            <p>No students have an appointment on this date</p>
                        @else
                            <ol>
                                @foreach ($appointments as $appointment)
                                    <li>{{$appointment->student->FirstName}} {{$appointment->student->LastName}}:  {{ \Carbon\Carbon::parse($appointment->StartDate)->format('g:i A')}} - {{\Carbon\Carbon::parse($appointment->EndDate)->format('g:i A') }}</li>
                                @endforeach
                            </ol>
                        @endif
                    </div>

                </div>
            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
      </div>
    </div>
</div>
