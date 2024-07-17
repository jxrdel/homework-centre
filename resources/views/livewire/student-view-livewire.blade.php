<div>
    

    <form wire:submit.prevent="validateStudent">
        <div class="row" style="margin-top:20px">
            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                    </div>
                    <div class="col">
                        <label for="">{{$this->childfirstname}}</label>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                    </div>
                    <div class="col">
                        <label for="">{{$this->childlastname}}</label>
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
                        <label for="">{{$this->childothernames}}</label>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Date of Birth: &nbsp;</label>
                    </div>
                    <div class="col">
                        <input disabled class="form-control" wire:model="childdob" type="date" style="width: 100%;color:black;">
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
                        <label for="">{{$this->sexofchild}}</label>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Name of School: &nbsp;</label>
                    </div>
                    <div class="col">
                        <label for="">{{$this->schoolname}}</label>
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
                        <label for="">{{$this->childaddress}}</label>
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
                        <label for="">{{$this->doctorname}}</label>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Office Phone: &nbsp;</label>
                    </div>
                    <div class="col">
                        <label for="">{{$this->doctorphone}}</label>
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
                        <label for="">{{$this->doctoraddress}}</label>
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
                        <label for="">{{$this->doctorvtc}}</label>
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
                        <label for="">{{$this->allergies}}</label>
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
                        <label for="">{{$this->medicalproblems}}</label>
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
                        <label for="">{{$this->disabilities}}</label>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="col" style="display: flex;">
                    <div class="col-4">
                        <label style="margin-top:5px;" for="title">Blood Type: &nbsp;</label>
                    </div>
                    <div class="col">
                        <label for="">{{$this->bloodtype}}</label>
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
                        <label for="">{{$this->additionalinfo}}</label>
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

            <div class="col" style="display: flex;justify-content:center">
                <button wire:loading.attr="disabled" class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px">
                    Edit
                </button>
            </div>
        </div>
        {{-- <div class="d-flex justify-content-end">
        </div> --}}
    </form>
</div>
