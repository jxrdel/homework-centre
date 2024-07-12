<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createPickupModal" tabindex="-1" aria-labelledby="createPickupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="createPickupModalLabel" style=" text-align:center">Add Pickup Contact</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="createPickup" action="">
            <div class="modal-body">

                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="pickupfirstname" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="pickuplastname" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
        
                </div>
        
                <div class="row" style="margin-top:10px">
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Email: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="pickupemail" type="email" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Mobile Phone: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="pickupmobileno" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
        
                </div>
        
        
                <div class="row" style="margin-top:10px">
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Home Phone: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="pickuphomeno" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Work Phone: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="pickupworkno" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
        
                </div>
        
                <div class="row" style="margin-top:10px">
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Address: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="pickupaddress" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Picture: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control @error('pickuppicture')is-invalid @enderror" id="formFile" wire:model="pickuppicture" type="file" style="width: 100%;">
                                <div style="color:red">@error('pickuppicture') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
        
                </div>

            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button wire:loading.attr="disabled" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
