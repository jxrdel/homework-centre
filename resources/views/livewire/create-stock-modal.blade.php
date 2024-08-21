<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createStockModal" tabindex="-1" aria-labelledby="createStockModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createStockModalLabel" style="color: black; text-align:center">Create Stock Item</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="createStock" action="">
            <div class="modal-body" style="color: black">
                

                <div class="row" style="margin-top:10px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;margin-left:-10px" for="title">Quantity: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input required class="form-control" wire:model="quantity" type="number" autocomplete="off" style="width: 100%;color: black">
                            </div>
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Item Name: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input required class="form-control" wire:model="itemname" type="text" autocomplete="off" style="width: 100%;color: black">
                            </div>
                        </div>
                    </div>
        
                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;">
                        <div class="col-2">
                            <label style="margin-top:5px;" for="title">Description: &nbsp;</label>
                        </div>
                        <div class="col">
                            <textarea style="color: black" wire:model="notes" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                </div>

                <div class="row" style="margin-top:10px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;margin-left:-10px" for="title">Code: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="code" type="text" autocomplete="off" style="width: 100%;color: black">
                            </div>
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Addition: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input wire:model="addition" class="form-check-input" type="checkbox" name="addition">
                            </div>
                        </div>
                    </div>
        
                </div>

                <div class="row" style="margin-top:10px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;margin-left:-10px" for="title">Removal: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="removal" type="text" autocomplete="off" style="width: 100%;color: black">
                            </div>
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Details of Removal: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input class="form-control" wire:model="detailsofremoval" type="text" autocomplete="off" style="width: 100%;color: black">
                            </div>
                        </div>
                    </div>
        
                </div>

            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
