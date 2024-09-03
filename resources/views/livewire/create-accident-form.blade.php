<div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route('admin.forms')}}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
            <strong style="margin-right: 90px"><i class="fa-solid fa-file-pen"></i> &nbsp; Accident Report Form</strong>
        </h1>
    </div>

    <div class="card" style="margin-bottom: 30px">
        <div class="card-body"><div class="row" style="margin-top:30px">
        </div>
    
        <form wire:submit.prevent="save">
            <div wire:ignore class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Name of Injured Child: <span style="color: red">*</span></label>
                        </div>
                        <div class="col">
                            <select required id="studentSelect" class="js-example-basic-single" name="facility" style="width: 100%">
                                <option value="">Select a Student</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->StudentID }}">{{ $student->FirstName }} {{ $student->LastName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
    
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Age of Injured Child: <span style="color: red">*</span></label>
                        </div>
                        <div class="col">
                            <input readonly class="form-control" wire:model="childage" type="number" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
            </div>
    
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Location of the accident: <span style="color: red">*</span>&nbsp;</label>
                        </div>
                        <div class="col">
                            <input required class="form-control" wire:model="accidentlocation" type="text" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Date & Time of accident: <span style="color: red">*</span></label>
                        </div>
                        <div class="col">
                            <input required class="form-control @error('timeofaccident')is-invalid @enderror" wire:model="timeofaccident" type="datetime-local" style="width: 100%;color:black;">
                            <div style="color:red">@error('timeofaccident') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <label style="margin-top:5px;" for="title">Brief description of accident: <span style="color: red">*</span>&nbsp;</label>
                            <textarea required style="color: black"wire:model="accidentdescription" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <label style="margin-top:5px;" for="title">Describe briefly the nature and extent of injuries (attach a copy of medical report if applicable) &nbsp;<span style="color: red">*</span></label>
                            
                            <textarea required style="color: black"wire:model="injurydescription" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-2">
                            <label style="margin-top:5px;" for="title">Medical Report: &nbsp;</label>
                        </div>
                        <div class="col-3">
                            <input class="form-control @error('medicalreport')is-invalid @enderror" id="formFile" wire:model="medicalreport" type="file" style="width: 100%;">
                            <div style="color:red">@error('medicalreport') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <label style="margin-top:5px;" for="title">Remedial Actions Taken after the accident and by whom: &nbsp;</label>
                            
                            <textarea style="color: black"wire:model="remedialactions" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-3">
                            <label for="title">Parent/ guardian was notified: &nbsp;<span style="color: red">*</span></label>
                        </div>
                        <div class="col">
                            <input required wire:model="parentnotified" value="true" type="radio" name="parentnotified" id="yesRadio" autocomplete="off">
                            <label for="yesRadio">Yes</label>&nbsp;&nbsp;

                            <input wire:model="parentnotified" value="false" type="radio" name="parentnotified" id="noRadio" autocomplete="off">
                            <label for="noRadio">No</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Name of person making this report:</label>
                        </div>
                        <div class="col">
                            <input readonly required class="form-control" wire:model="reportername" type="text" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Job Title: <span style="color: red">*</span></label>
                        </div>
                        <div class="col">
                            <input required class="form-control" wire:model="jobtitle" type="text" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
            </div>

            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Date:</label>
                        </div>
                        <div class="col">
                            <input disabled required class="form-control" wire:model="dateofreport" type="date" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
                <div class="col">
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
    </div>
    
        
</div>

@script
    <script>
        $('#studentSelect').select2();
        studentSelect
        $('#studentSelect').on('change', function() {
            var student = $(this).val(); // Get selected values as an array
            $wire.setStudent(student); // Pass selected values to Livewire
        });
    </script>
@endscript
