<div>

    <form class="user" wire:submit.prevent="save">
        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="firstname" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="lastname" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                        <input class="form-control" wire:model="email" type="email" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Mobile Phone: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="mobileno" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                        <input class="form-control" wire:model="homeno" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Extension: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="workno" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>


        <div class="row" style="margin-top:10px">

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Ministry: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="ministry" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Department: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="department" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>


        <div class="row" style="margin-top:10px">

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Relationship to Child: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="relationship" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="formFile" class="form-label">Photo: &nbsp;</label>
                    </div>

                    @if ($picturepath)
                    <div class="col-md-3">
                        <div class="" style="max-height: 180px;">
                            <img style="max-height: 180px;width:auto;" src="{{ Storage::url($picturepath) }}" width="150" height="150" class="img-fluid rounded" alt="...">
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

        <div class="row" style="margin-top:20px">

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-2">
                        <label style="margin-top:5px;" for="title">Address: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="address" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:10px">

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-2">
                        <label style="margin-top:5px;" for="title">Village/Town/City: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="vtc" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>



        <hr style="margin-top: 20px">

        <div class="row" style="margin-top: 30px">
            <button  wire:loading.attr="disabled" class="btn btn-primary btn-icon-split" style="width: 8rem;margin:auto">
                <span class="icon text-white-50">
                    <i class="bi bi-floppy2-fill" style="color: white"></i>
                </span>
                <span class="text"  style="width: 200px;">Save</span>
            </button>
        </div>
    </form>
</div>
