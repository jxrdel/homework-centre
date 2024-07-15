<div>
    @if ($this->parentform)

        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4"><i class="fa-solid fa-file-lines fa-lg"></i> &nbsp;Registration Form</h1>
        </div>
        <div style="color:red; text-align: center;padding:10px">@error('error') {{ $message }} @enderror</div>

        <div class="row">
            <div class="" style="margin: auto">
                <h5 style="text-align: center"><strong>Parent/Guardian Information</strong></h5>
            </div>
        </div>

        <form class="user" wire:submit.prevent="validateParent">
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="parentfirstname1" type="text" autocomplete="off" style="width: 100%;color:black;" autofocus>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="parentlastname1" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                            <input class="form-control" wire:model="parentemail1" type="email" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Mobile Phone: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="parentmobileno1" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                            <input class="form-control" wire:model="parenthomeno1" type="text" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Extension: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="parentworkno1" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                            <input class="form-control" wire:model="parentministry1" type="text" autocomplete="off" style="width: 100%;color:grey;">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Department: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="parentdepartment1" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                            <input class="form-control" wire:model="parentrelationship1" type="text" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="formFile" class="form-label">Photo: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control @error('parentpicture1')is-invalid @enderror" id="formFile" wire:model="parentpicture1" type="file" style="width: 100%;">
                            <div style="color:red">@error('parentpicture1') {{ $message }} @enderror</div>
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
                            <input class="form-control" wire:model="parentaddress1" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                            <input class="form-control" wire:model="parentvtc1" type="text" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>

            </div>

            @if (!$this->multipleparents)
                <div class="row" style="margin-top:10px">
                    <a type="button" wire:click="toggleMultipleParents" class="btn btn-primary btn-icon-split" style="width: 14rem;margin:auto">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus" style="color: white"></i>
                        </span>
                        <span class="text"  style="width: 200px;">Add Parent/Guardian</span>
                    </a>
                </div>
            @else
                <div class="row" style="margin-top:10px">
                    <a type="button" wire:click="toggleMultipleParents" class="btn btn-danger btn-icon-split" style="width: 16rem;margin:auto">
                        <span class="icon text-white-50">
                            <i class="fas fa-xmark" style="color: white"></i>
                        </span>
                        <span class="text"  style="width: 400px;">Remove Parent/Guardian</span>
                    </a>
                </div>
            @endif

            @if ($this->multipleparents)
            <div class="row" style="margin-top:20px">
                <div class="" style="margin: auto">
                    <h5 style="text-align: center"><strong>Parent/Guardian #2</strong></h5>
                </div>
            </div>
                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="parentfirstname2" type="text" autocomplete="off" style="width: 100%;color:black;" @required($this->multipleparents)>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="parentlastname2" type="text" autocomplete="off" style="width: 100%;color:black;" @required($this->multipleparents)>
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
                                <input class="form-control" wire:model="parentemail2" type="email" style="width: 100%;color:black;" @required($this->multipleparents)>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Mobile Phone: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="parentmobileno2" type="text" autocomplete="off" style="width: 100%;color:black;" @required($this->multipleparents)>
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
                                <input class="form-control" wire:model="parenthomeno2" type="text" autocomplete="off" style="width: 100%;color:black;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Work Phone: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="parentworkno2" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                                <input class="form-control" wire:model="parentministry2" type="text" autocomplete="off" style="width: 100%;color:grey;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Department: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="parentdepartment2" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                                <input class="form-control" wire:model="email" type="parentrelationship2" style="width: 100%;color:black;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="formFile" class="form-label">Photo: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control @error('parentpicture2')is-invalid @enderror" id="formFile" wire:model="parentpicture2" type="file" style="width: 100%;">
                                <div style="color:red">@error('parentpicture2') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin-top:20px">

                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Address: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="parentaddress2" type="text" autocomplete="off" style="width: 100%;color:black;">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin-top:10px">

                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Village/Town/City: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="parentvtc2" type="text" autocomplete="off" style="width: 100%;color:black;">
                            </div>
                        </div>
                    </div>

                </div>
            @endif


            <hr style="margin-top: 20px">

            <div class="d-flex justify-content-end">
                <button wire:loading.attr="disabled" class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:10px;width:200px">
                    Next <i class="fa-solid fa-circle-arrow-right"></i>
                </button>
            </div>
        </form>
    @endif

    @include('livewire.create-pickup')

    @if ($this->emergencycontactform)

    <form wire:submit.prevent="validateEmergencyContact">
        <div class="row">
            <div class="" style="margin: auto">
                <h5 style="text-align: center"><strong>Emergency Contact</strong></h5>
                <p style="text-align: center">This contact must be different from parent/guardian</p>
            </div>
        </div>

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
                    <div class="col">
                        <input class="form-control @error('ecpicture')is-invalid @enderror" id="formFile" wire:model="ecpicture" type="file" style="width: 100%;">
                        <div style="color:red">@error('ecpicture') {{ $message }} @enderror</div>
                    </div>
                </div>
            </div>

        </div>

        <hr style="margin-top: 10px">

        <div class="row" style="margin-top: 10px">
            <div class="" style="margin: auto">
                <h5 style="text-align: center"><strong>Pickup Authorization</strong></h5>
                <p style="text-align: justify">
                    Your child will only be released to an authorized person listed on this form
                    (parent/guardian and /or emergency Contact). In case of an unforeseen circumstance, please indicate the name,
                    address and phone number of any other
                    person/s who you authorized to pick up your child on your behalf.
                    Click the button below to add an authorized pickup contact</p>
            </div>
        </div>

        <div class="row" style="padding: 10px">
            <a type="button" data-bs-toggle="modal" @if (count($this->pickupcontacts) < 3)
                data-bs-target="#createPickupModal" class="btn btn-primary btn-icon-split" style="width: 14rem; margin:auto"
            @else
                class="btn btn-secondary btn-icon-split" style="width: 14rem; margin:auto;cursor: not-allowed"
            @endif >
                <span class="icon text-white-50">
                    <i class="fas fa-plus" style="color: white"></i>
                </span>
                <span class="text"  style="width: 200px"> &nbsp; Add Pickup Contact</span>
            </a>
        </div>

        <div class="row" style="margin-top: 10px">
            <table id="pickupTable" class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th style="width: 100px; text-align:center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->pickupcontacts as $index => $contact)
                    <tr>
                        <td>{{$contact['FirstName']}} {{$contact['LastName']}}</td>
                        <td>{{$contact['MobileNo']}}</td>
                        <td style="text-align: center"><button wire:click="removePickupContact({{$index}})" type="button" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></button></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center">No pickup contacts added</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

        <hr style="margin-top: 20px">


        <div class="row">
            <div class="col">
                <a href="#" wire:click="backBtnEmergencyContact" class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px">
                    <i class="fa-solid fa-circle-arrow-left"></i> Back
                </a>
            </div>

            <div class="col" style="display: flex;justify-content:end">
                <button wire:loading.attr="disabled" class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px">
                    Next <i class="fa-solid fa-circle-arrow-right"></i>
                </button>
            </div>
        </div>
    </form>
    @endif

    @if ($this->childform)

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
    @endif

    @if ($this->addchild)

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4"><i class="fa-solid fa-circle-question"></i> &nbsp;Would you like to add another child?</h1>
    </div>
        <div class="row">
            <div class="col">
                <button  wire:click="addChild" class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px;margin:auto">
                    Add Another Child <i class="fas fa-plus"></i>
                </button>
            </div>

            <div class="col">
                <button  wire:click="addChildNext" class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px;margin:auto">
                    No, Continue <i class="fa-solid fa-circle-arrow-right"></i>
                </button>
            </div>
        </div>
    @endif

    @if ($this->termsform)

        <form wire:submit.prevent="finalRegistration">
        <div class="row">
            <div class="" style="margin: auto">
                <h5 style="text-align: center"><strong>Media Release</strong></h5>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>I hereby

                    <input required wire:model.live="mediarelease" value=true type="radio" class="btn-check" name="media-release" id="iagree" autocomplete="off">
                    <label for="iagree"><strong style="text-decoration: underline">Give</strong></label>&nbsp;&nbsp;

                    <input wire:model.live="mediarelease" value=false type="radio" class="btn-check" name="media-release" id="donotagree" autocomplete="off">
                    <label for="donotagree"><strong style="text-decoration: underline">Do Not Give</strong></label>

                    permission for the Ministry of Health to use Pictures and videos of my child on social media,
                    newspapers and other promotional campaigns Related to the Ministry of Health.
                </p>
            </div>
        </div>

        <hr style="margin-top: 10px">

        <div class="row" style="margin-top:10px">
            <div class="" style="margin: auto">
                <h5 style="text-align: center"><strong>Emergency Consent</strong></h5>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>It is our policy to notify a parent/guardian when a child is ill or needs medical attention.  Occasionally, we cannot contact a
                    parent/guardian and we need to get immediate help for the child.  Our procedure is not take the child to the nearest emergency service.
                </p>
                <p>Please sign below so that we can take appropriate action on behalf of your child.</p>

                <p>
                    I hereby
                    <input required wire:model.live="emergencyconsent" value=true type="radio" class="btn-check" name="emergency-consent" id="iagree" autocomplete="off">
                    <label for="iagree"><strong style="text-decoration: underline">Give</strong></label>&nbsp;&nbsp;

                    <input wire:model.live="emergencyconsent" value=false type="radio" class="btn-check" name="emergency-consent" id="donotagree" autocomplete="off">
                    <label for="donotagree"><strong style="text-decoration: underline">Do Not Give</strong></label>

                    consent for my child(ren) when ill/injured, to be taken to the nearest emergency centre by the staff of my child’s vacation and after-school
                    centre when i/we cannot be contacted.  I consent to an ambulance being called to transport the child, if necessary.
                </p>
            </div>
        </div>

        <hr style="margin-top: 10px">

        <div class="row" style="margin-top:10px">
            <div class="" style="margin: auto">
                <h5 style="text-align: center"><strong>Terms & Conditions</strong></h5>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p><a href="#">Click Here to view the terms and conditions</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-9">
                <p>Please click "I Agree" as having understood and agreed with the terms and conditions of use</p>
            </div>
            <div class="col">
                <div>

                    <input wire:model.live="iagree" value=true type="radio" class="btn-check" name="options-edited" id="iagree" autocomplete="off">
                    <label for="iagree">I Agree</label>&nbsp;&nbsp;

                    <input wire:model.live="iagree" value=false type="radio" class="btn-check" name="options-edited" id="donotagree" autocomplete="off">
                    <label for="donotagree">I Do Not Agree</label>

                    {{-- <input wire:click="toggleAgreeTerms" type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck1"><i class="fa-solid fa-check"></i></label> --}}
                </div>
            </div>
        </div>

        <div class="" style="margin-top:20px">
            <button @disabled(!$this->iagree || $this->iagree == "false") class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px;margin:auto">
                Submit
            </button>
        </div>
    </form>
    @endif

            {{-- <div class="row" style="margin-top:30px">

                <p style="margin-left: 10px">Already Registered? <a href="{{route('login')}}">Click here to login</a></p>

            </div> --}}
    @if ($this->registrationcomplete)
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4"><i class="fa-solid fa-circle-check fa-lg"></i> &nbsp;You have been successfully registered!</h1>
        </div>

        <div class="row" style="margin-top:10px;text-align:center">

            <label style="margin:auto;padding:20px" for="title">Your username is <strong style="text-decoration: underline">{{$this->newusername}}</strong>. Your password is the same as your Windows password.</label>

            <a class="btn btn-primary btn-block" href="{{route('login')}}" style="width: 50%;margin-top:30px;margin:auto">Login</a>
        </div>
    @endif

</div>
