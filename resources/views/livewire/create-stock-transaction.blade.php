<div wire:ignore.self class="modal fade" id="createTransactionModal" tabindex="-1" aria-labelledby="createTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="createTransactionModalLabel" style="color: black; text-align:center">Create Stock Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="createTransaction" action="">
            <div class="modal-body" style="color: black">
                

                <div class="row" style="margin-top:10px">
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;margin-left:-10px" for="title">Transaction Type: &nbsp;</label>
                            </div>
                            <div class="col">
                                <select required class="form-select" wire:model="transactiontype" required>
                                    <option value="">Select a Type</option>
                                    <option value="Addition">Addition</option>
                                    <option value="Removal">Removal</option>
                                </select>
                            </div>
                        </div>
                    </div>
        
                    <div class="col">
                        <div class="col" style="display: flex;">
                            <div class="col-4">
                                <label style="margin-top:5px;" for="title">Quantity: &nbsp;</label>
                            </div>
                            <div class="col">
                                <input required class="form-control @error('timeofaccident')is-invalid @enderror" wire:model="transactionquantity" type="number" autocomplete="off" style="width: 100%;color: black">
                                <div style="color:red">@error('transactionquantity') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
        
                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;">
                        <div class="col-2">
                            <label style="margin-top:5px;" for="title">Transaction Details: &nbsp;</label>
                        </div>
                        <div class="col">
                            <textarea style="color: black" wire:model="transactiondetails" class="form-control" cols="10" rows="3"></textarea>
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