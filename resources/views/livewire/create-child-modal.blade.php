<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createChildModal" tabindex="-1" aria-labelledby="createChildModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createChildModalLabel" style="color: black">Create Child</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div style="color:red; text-align: center;padding:10px">@error('error') {{ $message }} @enderror</div>
        <form wire:submit.prevent="createChild" action="">
            <div class="modal-body">

                <div class="row">
                    <div class="col-3">
                        <label style="margin-top: 5px" for="title">First Name: &nbsp;</label>
                    </div>

                    <div class="col">

                        <input type="text" wire:model="firstname" class="form-control" autocomplete="off" required>
                    </div>

                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col-3">
                        <label style="margin-top: 5px" for="title">Last Name: &nbsp;</label>
                    </div>

                    <div class="col">

                        <input type="text" wire:model="lastname" class="form-control" autocomplete="off" required>
                    </div>

                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col-3">
                        <label style="margin-top: 5px" for="title">Date of Birth: &nbsp;</label>
                    </div>

                    <div class="col">
                        <input type="date" wire:model="dob" class="form-control" aria-label="End Date" autocomplete="off" required>
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
