<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createPickupModal" tabindex="-1" aria-labelledby="createPickupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="createPickupModalLabel" style=" text-align:center">Add Pickup Contact</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="createPickup" action="">
            <div class="modal-body" style="color: black">

                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="pickupname" type="text" style="width: 70%;color:black;margin-left:50px" required>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Address: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="pickupaddress" type="text" style="width: 70%;color:black;margin-left:50px" required>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Phone No: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="pickupphoneno" type="text" style="width: 70%;color:black;margin-left:50px" required>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
