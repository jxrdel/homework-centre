<div>
    @if ($this->parentform)

        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4"><i class="fa-solid fa-file-lines fa-lg"></i> &nbsp;Registration Form</h1>
        </div>
        <div style="color:red; text-align: center;padding:10px">@error('error') {{ $message }} @enderror</div>

        <div class="row">
            <div class="" style="margin: auto">
                <h5><strong>Parent/Guardian Information</strong></h5>
            </div>
        </div>

        <form class="user" wire:submit.prevent="registerParent">
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="parentfirstname1" type="text" autocomplete="off" style="width: 100%;color:black;" required autofocus>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="parentlastname1" type="text" autocomplete="off" style="width: 100%;color:black;" required>
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
                            <input class="form-control" wire:model="parentmobileno1" type="text" autocomplete="off" style="width: 100%;color:black;" required>
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
                            <input class="form-control" wire:model="parenthomeno1" type="text" autocomplete="off" style="width: 100%;color:black;" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Work Phone: &nbsp;</label>
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
                            <input class="form-control" wire:model="parentrelationship1" type="text" autocomplete="off" style="width: 100%;color:black;" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="formFile" class="form-label">Picture: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" id="formFile" wire:model="parentpicture1" type="file" style="width: 100%;">
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
                            <input class="form-control" wire:model="parentaddress1" type="text" autocomplete="off" style="width: 100%;color:black;" required>
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
                    <h5><strong>Parent/Guardian #2</strong></h5>
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
                                <input class="form-control" wire:model="email" type="parentrelationship2" style="width: 100%;color:black;" required>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="formFile" class="form-label">Picture: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" id="formFile" wire:model="parentpicture2" type="file" style="width: 100%;">
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
                                <input class="form-control" wire:model="parentaddress2" type="text" autocomplete="off" style="width: 100%;color:black;" required>
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
            
            <div class="row" style="margin-top:30px">
                <div class="" style="margin: auto">
                    <h5 style="text-align: center"><strong>Emergency Contact</strong></h5>
                    <p>This contact must be different from parent/guardian</p>
                </div>
            </div>

            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="ecfirstname" type="text" autocomplete="off" style="width: 100%;color:black;" required>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="eclastname" type="text" autocomplete="off" style="width: 100%;color:black;" required>
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
                            <input class="form-control" wire:model="ecmobileno" type="text" autocomplete="off" style="width: 100%;color:black;" required>
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
                            <input class="form-control" wire:model="ecrelationship" type="text" autocomplete="off" style="width: 100%;color:black;" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                </div>

            </div>
            
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px">
                    Save & Continue <i class="fa-solid fa-circle-arrow-right"></i>
                </button>
            </div>
        </form>
    @endif
    
    @if (!$this->childform)
                
        <div class="row" style="margin-top:30px">
            <div class="" style="margin: auto">
                <h5 style="text-align: center"><strong>Child Information</strong></h5>
            </div>
        </div>

        <form wire:submit.prevent="registerStudent">
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="childfirstname" type="text" autocomplete="off" style="width: 100%;color:black;" required>
                        </div>
                    </div>
                </div>
    
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="childlastname" type="text" autocomplete="off" style="width: 100%;color:black;" required>
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
                            <input class="form-control" wire:model="childdob" type="date" style="width: 100%;color:black;" required>
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
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Male" wire:model="sexofchild">
                                <label class="form-check-label" for="flexRadioDefault1">
                                Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Female" wire:model="sexofchild">
                                <label class="form-check-label" for="flexRadioDefault2">
                                Female
                                </label>
                            </div>
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
    
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-2">
                            <label style="margin-top:5px;" for="title">Address: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="childaddress" type="text" autocomplete="off" style="width: 100%;color:black;" required>
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
                            <input class="form-control" wire:model="doctorno" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                            <input class="form-control" wire:model="allergies" type="text" autocomplete="off" style="width: 100%;color:black;" placeholder="Please indicate likes/dislikes, special interest, etc.">
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
                            <input class="form-control" id="formFile" wire:model="parentpicture1" type="file" style="width: 100%;">
                        </div>
                    </div>
                </div>
    
            </div>
            
            
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary btn-block" style="font-size: 1rem;margin-top:30px;width:200px">
                    Save & Continue <i class="fa-solid fa-circle-arrow-right"></i>
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
