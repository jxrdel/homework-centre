<div>
    <form wire:submit.prevent="save">
        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Username: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control @error('username')is-invalid @enderror" wire:model="username" type="text" autocomplete="off" style="width: 100%;color:black;">
                        <div style="color:red">@error('username') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>

            <div class="col"></div>
        </div>

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
                    <div class="col">
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
        
        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-3">
                        <label for="title">Media Release &nbsp;</label>
                    </div>
                    <div class="col">
                        <input wire:model="mediarelease" value="1" type="radio" name="mediarelease" id="yesRadioMR" autocomplete="off">
                        <label for="yesRadioMR">Yes</label>&nbsp;&nbsp;

                        <input wire:model="mediarelease" value="0" type="radio" name="mediarelease" id="noRadioMR" autocomplete="off">
                        <label for="noRadioMR">No</label>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-3">
                        <label for="title">Emergency Consent &nbsp;</label>
                    </div>
                    <div class="col">
                        <input wire:model="emergencyconsent" value="1" type="radio" name="emergencyconsent" id="yesRadioEC" autocomplete="off">
                        <label for="yesRadioEC">Yes</label>&nbsp;&nbsp;

                        <input wire:model="emergencyconsent" value="0" type="radio" name="emergencyconsent" id="noRadioEC" autocomplete="off">
                        <label for="noRadioEC">No</label>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-3">
                        <label for="title">Admin &nbsp;</label>
                    </div>
                    <div class="col">
                        <input wire:model="isadmin" value="1" type="radio" name="isadmin" id="yesRadioAdmin" autocomplete="off">
                        <label for="yesRadioAdmin">Yes</label>&nbsp;&nbsp;

                        <input wire:model="isadmin" value="0" type="radio" name="isadmin" id="noRadioAdmin" autocomplete="off">
                        <label for="noRadioAdmin">No</label>
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-3">
                        <label for="title">Does this user have a Windows Login &nbsp;</label>
                    </div>
                    <div class="col">
                        <input wire:model="hasWindowsLogin" value="1" type="radio" name="hasWindowsLogin" id="yesRadioWL" autocomplete="off">
                        <label for="yesRadioWL">Yes</label>&nbsp;&nbsp;

                        <input wire:model="hasWindowsLogin" value="0" type="radio" name="hasWindowsLogin" id="noRadioWL" autocomplete="off">
                        <label for="noRadioWL">No</label>
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
