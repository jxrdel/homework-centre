<!-- Modal -->
<div wire:ignore.self class="modal fade" id="dateAppointmentModal" tabindex="-1" aria-labelledby="dateAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="dateAppointmentModalLabel" style="color: black">Appointment Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="editTimeslot" action="">
        <div class="modal-body">
            <div class="row">
                <p style="text-align: center"><a style="font-size:1rem" href="{{route('admin.attendance.class' , ['id' => $this->timeslotid])}}" class="btn btn-primary">Take Attendance</a></p>
            </div>
            <div class="row">
                <div class="col">
                    <input type="datetime-local" wire:model="starttime" class="form-control" aria-label="Start Time" autocomplete="off" required>
                </div>

                <div class="col">
                    <input type="datetime-local" wire:model="endtime" class="form-control" aria-label="End Time" autocomplete="off" required>
                </div>
            </div>
            <div class="row" style="margin-top: 20px">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Maximum number of students: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input required class="form-control" wire:model="maxenrollments" type="number" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="align-items: center">
            <div style="margin:auto">
                <button class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
      </div>
    </div>
</div>
