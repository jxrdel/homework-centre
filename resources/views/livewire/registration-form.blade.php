<div>
    <div style="color:red; text-align: center;padding:10px">@error('error') {{ $message }} @enderror</div>
    <form class="user" wire:submit.prevent="register">
        <div class="row" style="margin-top:10px">

            <div class="col" style="display: flex;">
                <div class="col-3">
                    <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                </div>
                <div class="col">
                    <input class="form-control" autocomplete="off" wire:model="firstname" type="text" style="width: 90%;color:black;margin-left:50px" required autofocus>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:10px">

            <div class="col" style="display: flex;">
                <div class="col-3">
                    <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                </div>
                <div class="col">
                    <input class="form-control" wire:model="lastname" type="text" style="width: 90%;color:black;margin-left:50px" required>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:10px">

            <div class="col" style="display: flex;">
                <div class="col-3">
                    <label style="margin-top:5px;" for="title">Email: &nbsp;</label>
                </div>
                <div class="col">
                    <input class="form-control" wire:model="email" type="email" style="width: 90%;color:black;margin-left:50px" required>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:10px">

            <div class="col" style="display: flex;">
                <div class="col-3">
                    <label style="margin-top:5px;" for="title">Cell Number: &nbsp;</label>
                </div>
                <div class="col">
                    <input class="form-control" wire:model="cellno" type="text" style="width: 90%;color:black;margin-left:50px" required>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top:10px">

            <div class="col" style="display: flex;">
                <div class="col-3">
                    <label style="margin-top:5px;" for="title">Home Number: &nbsp;</label>
                </div>
                <div class="col">
                    <input class="form-control" wire:model="homeno" type="text" style="width: 90%;color:black;margin-left:50px">
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
