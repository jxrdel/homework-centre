<div>
    @include('livewire.create-stock-transaction')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route('admin.stock')}}" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <h1 class="h3 mb-0 text-gray-800" style="flex: 1; text-align: center;">
            <strong style="margin-right: 90px"><i class="fa-solid fa-box-open"></i> &nbsp; {{$this->itemname}}</strong>
        </h1>
    </div>

    <div class="card" style="margin-bottom: 30px">
        <div x-data="{ isEditing: $wire.entangle('isEditing') }" class="card-body">
            

            <div>
                <form wire:submit.prevent="save">
                    
                    <div class="row" style="margin-top:10px">
                        <div class="col">
                            <div class="col" style="display: flex;">
                                <div class="col-4">
                                    <label style="margin-top:5px;margin-left:-10px" for="title">Quantity: &nbsp;</label>
                                </div>
                                <div x-show="isEditing" class="col">
                                    <input readonly class="form-control" wire:model="quantity" type="number" autocomplete="off" style="width: 100%;color: black">
                                </div>

                                <div x-show="!isEditing" class="col">
                                    <input readonly class="form-control" wire:model="quantity" type="number" autocomplete="off" style="background-color: white;width: 100%;color: black;border:none">
                                </div>
                            </div>
                        </div>
            
                        <div class="col">
                            <div class="col" style="display: flex;">
                                <div class="col-4">
                                    <label style="margin-top:5px;" for="title">Item Name: &nbsp;</label>
                                </div>
                                <div x-show="isEditing" class="col">
                                    <input required class="form-control" wire:model="itemname" type="text" autocomplete="off" style="width: 100%;color: black">
                                </div>

                                <div x-show="!isEditing" class="col">
                                    <input readonly class="form-control" wire:model="itemname" type="text" autocomplete="off" style="background-color: white;width: 100%;color: black;border:none">
                                </div>
                            </div>
                        </div>
            
                    </div>
                    
                    <div class="row" style="margin-top:10px">
        
                        <div class="col" style="display: flex;">
                            <div class="col-2">
                                <label style="margin-top:5px;" for="title">Description: &nbsp;</label>
                            </div>
                            <div x-show="isEditing" class="col">
                                <textarea style="color: black" wire:model="notes" class="form-control" cols="10" rows="3"></textarea>
                            </div>

                            <div x-show="!isEditing" class="col">
                                <textarea readonly style="background-color: white;color: black;border:none" wire:model="notes" class="form-control" cols="10" rows="3"></textarea>
                            </div>
                        </div>
        
                    </div>
        
                    <div class="row" style="margin-top:10px">
                        <div class="col">
                            <div class="col" style="display: flex;">
                                <div class="col-4">
                                    <label style="margin-top:5px;margin-left:-10px" for="title">Code: &nbsp;</label>
                                </div>
                                <div x-show="isEditing" class="col">
                                    <input class="form-control" wire:model="code" type="text" autocomplete="off" style="width: 100%;color: black">
                                </div>
    
                                <div x-show="!isEditing" class="col">
                                    <input readonly class="form-control" wire:model="code" type="text" autocomplete="off" style="background-color: white;width: 100%;color: black;border:none">
                                </div>
                            </div>
                        </div>
            
                        <div class="col">
                        </div>
            
                    </div>
        
                    <div x-show="!isEditing" class="row" style="margin-top: 30px">
                        <button type="button" @click="isEditing = ! isEditing" class="btn btn-primary btn-icon-split" style="width: 8rem;margin:auto">
                            <span class="icon text-white-50">
                                <i class="fa-regular fa-pen-to-square" style="color: white"></i>
                            </span>
                            <span class="text"  style="width: 200px;">Edit</span>
                        </button>
                    </div>
        
                    <div  x-show="isEditing" class="row" style="margin-top:30px;justify-content:center">
                        <button  wire:loading.attr="disabled" class="btn btn-primary btn-icon-split" style="width: 8rem;">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-floppy-disk" style="color: white"></i>
                            </span>
                            <span class="text"  style="width: 200px;">Save</span>
                        </button>
                        &nbsp;
                        <button type="button" @click="isEditing = false" class="btn btn-dark btn-icon-split" style="width: 8rem;">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-xmark" style="color: white"></i>
                            </span>
                            <span class="text"  style="width: 200px;">Cancel</span>
                        </button>
                    </div>
            
                    <hr style="border-top: 0.7px solid;margin-top: 20px">
                </form>
            </div>

        

        <p style="color: black;font-size:1.2rem;text-align:center"><strong><i class="fa-solid fa-right-left"></i>&nbsp;Transactions:</strong></p>

        <div class="row">
            <button data-bs-toggle="modal" data-bs-target="#createTransactionModal"  class="btn btn-primary btn-icon-split" style="width: 12rem;margin:auto">
                <span class="icon text-white-50">
                    <i class="fa-solid fa-plus" style="color: white"></i>
                </span>
                <span class="text"  style="width: 200px;">Add Transaction</span>
            </button>
        </div>

        <div class="row" style="margin-top: 30px">

            <table id="myTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Transaction #</th>
                        <th>Transaction Type</th>
                        <th>Quantity</th>
                        <th>Details</th>
                        <th>Date</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$transaction->TransactionType}}</td>
                            <td>{{$transaction->Quantity}}</td>
                            <td>{{$transaction->TransactionDetails}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>{{$transaction->created_by}}</td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center">No Transactions Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    </div>
    </div>
    
        
</div>

@script
    <script>
        window.addEventListener('close-modal', event => {
            $('#createTransactionModal').modal('hide');
        })
    </script>
@endscript
