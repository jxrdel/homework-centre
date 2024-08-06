<!-- Modal -->
<div wire:ignore.self class="modal fade" id="viewReportModal" tabindex="-1" aria-labelledby="viewReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="viewReportModalLabel" style="color: black; text-align:center">Weekly Report</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="viewReport" action="">
            <div class="modal-body" style="color: black">

                <div class="row" style="margin-top:20px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Start Date: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input disabled style="color: black; background-color: transparent;" class="form-control" wire:model="startdate" type="date" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">End Date: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input disabled style="color: black; background-color: transparent;" class="form-control" wire:model="enddate" type="date" autocomplete="off" style="width: 100%;">
                            </div>
                        </div>
                    </div>
        
                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;">
                        <div class="col-2">
                            <label style="margin-top:5px;" for="title">Objectives: &nbsp;</label>
                        </div>
                        <div class="col">
                            <textarea disabled style="color: black; background-color: transparent;" wire:model="objectives" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;">
                        <div class="col-2">
                            <label style="margin-top:5px;" for="title">Activities Completed: &nbsp;</label>
                        </div>
                        <div class="col">
                            <textarea disabled style="color: black; background-color: transparent;" wire:model="activitiescompleted" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;">
                        <div class="col-2">
                            <label style="margin-top:5px;" for="title">Challenges: &nbsp;</label>
                        </div>
                        <div class="col">
                            <textarea disabled style="color: black; background-color: transparent;" wire:model="challenges" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                

            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
