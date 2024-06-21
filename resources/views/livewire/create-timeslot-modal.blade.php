<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createTimeslotModal" tabindex="-1" aria-labelledby="createTimeslotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createTimeslotModalLabel" style="color: black">Create Class</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="createTimeslot" action="">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <input type="datetime-local" wire:model="starttime" class="form-control" aria-label="Start Time" autocomplete="off" required>
                    </div>

                    <div class="col">
                        <input type="datetime-local" wire:model="endtime" class="form-control" aria-label="End Time" autocomplete="off" required>
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
