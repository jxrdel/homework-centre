<div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="margin: auto"><strong><i class="fa-solid fa-file-pen"></i> &nbsp; Complaint Form</strong></h1>
    </div>

    <div class="card" style="margin-bottom: 30px">
        <div class="card-body"><div class="row" style="margin-top:30px">
        </div>
    
        <form wire:submit.prevent="save">
    
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <p>
                            <label style="margin-top:5px;" for="title">Please receive the following complaint about an: <span style="color: red">*</span></label>
                            
                                <input required wire:model="complainttype" value="Unsafe Condition" type="radio" name="complainttype" id="unsafecondition" autocomplete="off">
                                <label for="unsafecondition">Unsafe Condition</label>&nbsp;&nbsp;

                                <input wire:model="complainttype" value="Unsafe Act" type="radio" name="complainttype" id="unsafeact" autocomplete="off">
                                <label for="unsafeact">Unsafe Act</label>
                            </p>
                        </div>
                    </div>
                </div>
    
            </div>
    
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <label style="margin-top:5px;" for="title">Location where Unsafe Condition exists or where Unsafe Act occurred: <span style="color: red">*</span></label>
                            
                            <textarea style="color: black"wire:model="complaintlocation" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <label style="margin-top:5px;" for="title">Details of complaint: <span style="color: red">*</span></label>
                            
                            <textarea style="color: black"wire:model="complaintdetails" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <label style="margin-top:5px;" for="title">Any further information? <span style="color: red">*</span></label>
                            
                            <textarea style="color: black"wire:model="additionalinfo" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <hr style="margin-top: 20px;border-top: 1px solid">

            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Name of person making this report:</label>
                        </div>
                        <div class="col">
                            <input disabled required class="form-control" wire:model="reportername" type="text" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Email:</label>
                        </div>
                        <div class="col">
                            <input readonly required class="form-control" wire:model="reporteremail" type="email" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
            </div>

            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Telephone:</label>
                        </div>
                        <div class="col">
                            <input required class="form-control" wire:model="reportertelno" type="text" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Extension:</label>
                        </div>
                        <div class="col">
                            <input required class="form-control" wire:model="reporterext" type="number" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
            </div>
            

            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Date: <span style="color: red">*</span></label>
                        </div>
                        <div class="col">
                            <input disabled class="form-control @error('dateofcomplaint')is-invalid @enderror" wire:model="dateofcomplaint" type="date" style="width: 100%;color:black;">
                            <div style="color:red">@error('dateofcomplaint') {{ $message }} @enderror</div>
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

