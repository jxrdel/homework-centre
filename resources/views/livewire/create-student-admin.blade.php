<div>
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route('admin.students.all')}}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
            <strong style="margin-right: 90px"><i class="fa-regular fa-address-card"></i> &nbsp; Create Student</strong>
        </h1>
    </div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">

                <div wire:ignore class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Parent: <span style="color: red">*</span></label>
                            </div>
                            <div class="col">
                            <select required id="parentSelect" class="js-example-basic-single" name="facility" style="width: 100%">
                                <option value="">Select a Parent</option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->FirstName }} {{ $parent->LastName }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                    </div>

                </div>
    
            <div class="row" style="margin-top:30px">
                <div class="" style="margin: auto">
                    <h5 style="text-align: center"><strong>Child Information</strong></h5>
                </div>
            </div>

                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">First Name: <span style="color: red">*</span></label>
                            </div>
                            <div class="col">
                                <input required class="form-control" wire:model="childfirstname" type="text" autocomplete="off" style="width: 100%;color:black;">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Last Name: <span style="color: red">*</span></label>
                            </div>
                            <div class="col">
                                <input required class="form-control" wire:model="childlastname" type="text" autocomplete="off" style="width: 100%;color:black;">
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
                                <label style="margin-top:5px;" for="title">Date of Birth: <span style="color: red">*</span></label>
                            </div>
                            <div class="col">
                                <input required class="form-control @error('childdob')is-invalid @enderror" wire:model="childdob" type="date" style="width: 100%;color:black;">
                                <div style="color:red">@error('childdob') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Sex: <span style="color: red">*</span></label>
                            </div>
                            <div class="col">
                                <p>
                                    
                                    <input required wire:model.live="sexofchild" value="Male" type="radio" name="sexofchild" id="malechild" autocomplete="off">
                                    <label for="malechild">Male</label>&nbsp;&nbsp;

                                    <input wire:model.live="sexofchild" value="Female" type="radio" name="sexofchild" id="femalechild" autocomplete="off">
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
                                <label style="margin-top:5px;" for="formFile" class="form-label">Photo: <span style="color: red">*</span></label>
                            </div>
                            
                            <div class="col">
                                <input required class="form-control @error('childpicture')is-invalid @enderror" id="formFile" wire:model="childpicture" type="file" style="width: 100%;">
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

                <div class="row" style="margin-top:20px">
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

                <div class="row" style="margin-top:20px">
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
                                <input class="form-control @error('immunizationpicture')is-invalid @enderror" id="formFile" wire:model="immunizationpicture" type="file" style="width: 100%;">
                                <div style="color:red">@error('immunizationpicture') {{ $message }} @enderror</div>
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
                {{-- <div class="d-flex justify-content-end">
                </div> --}}
            </form>
        </div>
    </div>
</div>


@script
    <script>
        $('#parentSelect').select2();
        parentSelect
        $('#parentSelect').on('change', function() {
            var parent = $(this).val(); // Get selected values as an array
            $wire.setParent(parent); // Pass selected values to Livewire
        });
    </script>
@endscript