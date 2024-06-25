<div>
    @if ($this->registrationform)

        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4"><i class="fa-solid fa-file-lines fa-lg"></i> &nbsp;Parent Registration Form</h1>
        </div>
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
    @else
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4"><i class="fa-solid fa-circle-check fa-lg"></i> &nbsp;You have been successfully registered!</h1>
        </div>

        <div class="row" style="margin-top:10px;text-align:center">

            <label style="margin:auto;padding:20px" for="title">Your username is {{$this->newusername}}. Your password is the same as your Windows password.</label>

            <a class="btn btn-primary btn-block" href="{{route('login')}}" style="width: 50%;margin-top:30px;margin:auto">Login</a>
        </div>
    @endif

</div>
