<div>
    <div style="color:red; text-align: center;padding:10px">@error('error') {{ $message }} @enderror</div>
    <form class="user" wire:submit.prevent="login">
        <div class="row" style="margin-top:10px">

            <div class="col" style="display: flex;">
                <div class="col-3">
                    <label style="margin-top:5px;" for="title">Supplier Name: &nbsp;</label>
                </div>
                <div class="col">
                    <input class="form-control" wire:model="suppliername" type="text" style="width: 90%;color:black;margin-left:50px" required>
                </div>
            </div>

        </div>
        
        <div class="row" style="margin-top:10px">

            <div class="col" style="display: flex;">
                <div class="col-3">
                    <label style="margin-top:5px;" for="title">Supplier Name: &nbsp;</label>
                </div>
                <div class="col">
                    <input class="form-control" wire:model="suppliername" type="text" style="width: 90%;color:black;margin-left:50px" required>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:30px">

            <p style="margin-left: 10px">Already Registered? <a href="{{route('login')}}">Click here to login</a></p>

        </div>
        <button class="btn btn-primary btn-block" style="font-size: 1rem;">
            Register
        </button>
    </form>
</div>
