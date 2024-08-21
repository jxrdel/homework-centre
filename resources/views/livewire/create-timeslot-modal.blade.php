<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createTimeslotModal" tabindex="-1" aria-labelledby="createTimeslotModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createTimeslotModalLabel" style="color: black">Create Classes</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
                <div class="row">
                    <p style="text-align: center;color:black">{{$this->formattedDate}}</p>
                    
                    @if (count($this->existingClasses) >= 1)
                        
                    <button wire:click="deleteClasses" style="text-align:center;width:80%;margin:auto" class="btn btn-danger">Delete Classes</button>

                    @else
                    
                    <button @disabled(count($this->existingClasses) >= 1) wire:click="createTimeslot" style="text-align:center;width:80%;margin:auto;" class="btn btn-primary">Create Classes</button>
                        
                    @endif


                </div>
            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
      </div>
    </div>
</div>
