<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editPickupModal" tabindex="-1" aria-labelledby="editPickupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="editPickupModalLabel" style=" text-align:center">Add Pickup Contact</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="editPickup" action="">
            <div class="modal-body">

                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="firstname" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="lastname" type="text" autocomplete="off" style="width: 100%;">
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
                                <input class="form-control" wire:model="email" type="email" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Mobile Phone: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="mobileno" type="text" autocomplete="off" style="width: 100%;">
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
                                <input class="form-control" wire:model="homeno" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Work Phone: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="workno" type="text" autocomplete="off" style="width: 100%;">
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
                                <input class="form-control" wire:model="address" type="text" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Picture: &nbsp;</label>
                            </div>
                            @if ($this->picturepath)
                            <div class="col-md-3">
                                <div class="" style="max-height: 180px;">
                                    <img style="max-height: 180px;width:auto;" src="{{ Storage::url($this->picturepath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
                                    <a wire:click="deletePicture" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                            @else
                            <div class="col">
                                <input class="form-control @error('picture')is-invalid @enderror" id="formFile" wire:model="picture" type="file" style="width: 100%;">
                                <div style="color:red">@error('picture') {{ $message }} @enderror</div>
                            </div>
                            @endif
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
