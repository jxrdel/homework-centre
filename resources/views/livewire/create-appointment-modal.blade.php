<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createAppointmentModal" tabindex="-1" aria-labelledby="createAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createAppointmentModalLabel" style="color: black">Create Appointment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="createAppointment" action="">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <input type="datetime-local" wire:model="startdate" class="form-control" aria-label="Start Date" autocomplete="off" required>
                    </div>

                    <div class="col">
                        <input type="datetime-local" wire:model="enddate" class="form-control" aria-label="End Date" autocomplete="off" required>
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col-3">
                        <label style="margin-top: 5px" for="title">Title: &nbsp;</label>
                    </div>

                    <div class="col">
                        <input type="text" wire:model="title" class="form-control" aria-label="Start Date" autocomplete="off" required>
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
