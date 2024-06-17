<!-- Modal -->
<div wire:ignore.self class="modal fade" id="dateAppointmentModal" tabindex="-1" aria-labelledby="dateAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="dateAppointmentModalLabel" style="color: black">Create Appointment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col" style="text-align: center">
                        <label style="margin-top: 5px;" for="title">Appointments on {{$this->date}}: &nbsp;</label>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col">
                        @if (count($studentnames) < 1)
                            <p>No students have an appointment on this date</p>
                        @else
                            <ol>
                                @foreach ($studentnames as $name)
                                    <li>{{$name}}</li>
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
