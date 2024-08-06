<!-- Modal -->
<div>
    <div class="row">
        <button @disabled($pickupcount >=3) type="button" data-bs-toggle="modal" data-bs-target="#createPickupModal" class="btn btn-primary btn-icon-split" style="width: 14rem;margin:auto">
            <span class="icon text-white-50">
                <i class="fas fa-plus" style="color: white"></i>
            </span>
            <span class="text"  style="width: 200px;">Add Pickup Contact</span>
        </button>
    </div>

    <div wire:ignore.self class="modal fade" id="createPickupModal" tabindex="-1" aria-labelledby="createPickupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="createPickupModalLabel" style=" text-align:center">Add Pickup Contact</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="save" action="">
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
                                <div class="col">
                                    <input class="form-control @error('picture')is-invalid @enderror" id="formFile" wire:model="picture" type="file" style="width: 100%;">
                                    <div style="color:red">@error('picture') {{ $message }} @enderror</div>
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
</div>