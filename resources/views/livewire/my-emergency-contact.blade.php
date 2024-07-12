<div>
    <form wire:submit.prevent="save">
        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="ecfirstname" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="eclastname" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                        <input class="form-control" wire:model="ecemail" type="email" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Mobile Phone: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="ecmobileno" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                        <input class="form-control" wire:model="echomeno" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Work Phone: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="ecworkno" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                        <input class="form-control" wire:model="ecrelationship" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Picture: &nbsp;</label>
                    </div>
                    @if ($ecpicturepath)
                    <div class="col-md-4">
                        <div class="" style="height: 180px;">
                            <img src="{{ Storage::url($ecpicturepath) }}" width="150" height="150" class="img-fluid rounded-start" alt="...">
                            <a wire:click="deletePicture" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    @else
                    <div class="col">
                        <input class="form-control @error('ecpicture')is-invalid @enderror" id="formFile" wire:model="ecpicture" type="file" style="width: 100%;">
                        <div style="color:red">@error('ecpicture') {{ $message }} @enderror</div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
        
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
