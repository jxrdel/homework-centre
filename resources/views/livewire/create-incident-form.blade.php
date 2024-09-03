<div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route('admin.forms')}}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
            <strong style="margin-right: 90px"><i class="fa-solid fa-file-pen"></i> &nbsp; Incident Report Form</strong>
        </h1>
    </div>

    <div class="card" style="margin-bottom: 30px">
        <div class="card-body"><div class="row" style="margin-top:30px">
        </div>
    
        <form wire:submit.prevent="save">
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Name of person making this report: <span style="color: red">*</span></label>
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
                            <label style="margin-top:5px;" for="title">Telephone Ext: <span style="color: red">*</span>&nbsp;</label>
                        </div>
                        <div class="col">
                            <input required class="form-control" wire:model="extno" type="number" autocomplete="off" style="width: 100%;color:black;">
                        </div>
                    </div>
                </div>
    
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col-4">
                            <label style="margin-top:5px;" for="title">Date & Time of accident: <span style="color: red">*</span></label>
                        </div>
                        <div class="col">
                            <input required class="form-control @error('timeofincident')is-invalid @enderror" wire:model="timeofincident" type="datetime-local" style="width: 100%;color:black;">
                            <div style="color:red">@error('timeofincident') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
    
            </div>
    
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <label style="margin-top:5px;" for="title">Where did the incident / dangerous occurrence happen?: <span style="color: red">*</span></label>
                            
                            <textarea required style="color: black"wire:model="incidentlocation" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <div class="col" style="display: flex;">
                        <div class="col">
                            <label style="margin-top:5px;" for="title">Brief description of incident / dangerous occurrence: <span style="color: red">*</span></label>
                            
                            <textarea required style="color: black"wire:model="incidentdescription" class="form-control" cols="10" rows="3"></textarea>
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

