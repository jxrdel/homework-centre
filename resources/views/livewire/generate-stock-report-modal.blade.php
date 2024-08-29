<!-- Modal -->
<div wire:ignore.self class="modal fade" id="generateReportModal" tabindex="-1" aria-labelledby="generateReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="generateReportModalLabel" style="color: black; text-align:center">Generate Stock Report</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="generateReport" action="">
            <div class="modal-body" style="color: black">
                

                <div class="row" style="margin-top:10px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;margin-left:-10px" for="title">Start Date: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input required class="form-control" wire:model="startdate" type="date" autocomplete="off" style="width: 100%;color: black">
                            </div>
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">End Date: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input required class="form-control @error('enddate')is-invalid @enderror" wire:model="enddate" type="date" autocomplete="off" style="width: 100%;color: black">
                                <div style="color:red">@error('enddate') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
        
                </div>


            </div>
            <div class="modal-footer" style="align-items: center">
                @if (!$this->reportGenerated)
                    <div style="margin:auto">
                        <button class="btn btn-primary">Generate Report</button>
                    </div>
                @else
                    <div style="margin:auto">
                        <a href="/generateStockReport/{{ $this->startdate }}/{{ $this->enddate }}" target="_blank" class="btn btn-primary">View Report</a>
                        <button type="button" wire:click="reset" class="btn btn-dark">Reset</button>
                    </div>
                @endif
            </div>
        </form>
      </div>
    </div>
</div>
