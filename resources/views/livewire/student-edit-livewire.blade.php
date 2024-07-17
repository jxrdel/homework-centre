<div>
    
    <div class="row" style="margin-top:30px">
        <div class="" style="margin: auto">
            <h5 style="text-align: center"><strong>Child Information</strong></h5>
        </div>
    </div>

    <form wire:submit.prevent="validateStudent">
        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="childfirstname" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="childlastname" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>


        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Other Name(s): &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="childothernames" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Date of Birth: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="childdob" type="date" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>


        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Sex: &nbsp;</label>
                    </div>
                    <div class="col">
                        <p>
                            
                            <input required wire:model.live="sexofchild" value="Male" type="radio" class="btn-check" name="sexofchild" id="malechild" autocomplete="off">
                            <label for="malechild">Male</label>&nbsp;&nbsp;

                            <input wire:model.live="sexofchild" value="Female" type="radio" class="btn-check" name="sexofchild" id="femalechild" autocomplete="off">
                            <label for="femalechild">Female</label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Name of School: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="schoolname" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="formFile" class="form-label">Photo: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control @error('childpicture')is-invalid @enderror" id="formFile" wire:model="childpicture" type="file" style="width: 100%;">
                        <div style="color:red">@error('childpicture') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>
            <div class="col"></div>

        </div>


        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-2">
                        <label style="margin-top:5px;" for="title">Address: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="childaddress" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>




        <div class="row" style="margin-top:30px">
            <div class="" style="margin: auto">
                <h5 style="text-align: center"><strong>Child's Medical Information</strong></h5>
            </div>
        </div>


        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Doctor: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="doctorname" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Office Phone: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="doctorphone" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
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
                        <input class="form-control" wire:model="doctoraddress" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-2">
                        <label style="margin-top:5px;" for="title">Village/Town/City: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="doctorvtc" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-2">
                        <label style="margin-top:5px;" for="title">Child's Allergies: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="allergies" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-2">
                        <label style="margin-top:5px;" for="title">Medical Problems: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="medicalproblems" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Disabilities: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="disabilities" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Blood Type: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="bloodtype" type="text" autocomplete="off" style="width: 100%;color:black;">
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-2">
                        <label style="margin-top:5px;" for="title">Additional Information: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" wire:model="additionalinfo" type="text" autocomplete="off" style="width: 100%;color:black;" placeholder="Please indicate likes/dislikes, special interest, etc.">
                    </div>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-2">
                        <label style="margin-top:5px;" for="title">Immunization Card: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input class="form-control" id="formFile" wire:model="immunizationpicture" type="file" style="width: 100%;">
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col">
                <a href="#" wire:click="backBtnChildForm" class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px">
                    <i class="fa-solid fa-circle-arrow-left"></i> Back
                </a>
            </div>

            <div class="col" style="display: flex;justify-content:end">
                <button wire:loading.attr="disabled" class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px">
                    Next <i class="fa-solid fa-circle-arrow-right"></i>
                </button>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-end">
        </div> --}}
    </form>
</div>
