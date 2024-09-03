<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editUserModalLabel" style="color: black; text-align:center">Create User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="editUser" action="">
            <div class="modal-body" style="color: black">
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">First Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model.live.debounce.250ms="firstname" type="text" style="width: 70%;color:black;margin-left:50px" required>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Last Name: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model.live.debounce.250ms="lastname" type="text" style="width: 70%;color:black;margin-left:50px" required>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Username: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="username" type="text" style="width: 70%;color:black;margin-left:50px" required>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Email: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input class="form-control" wire:model="email" type="text" style="width: 70%;color:black;margin-left:50px" required>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Admin: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input style="margin-left: 50px" wire:model="isadmin" class="form-check-input" type="checkbox" name="IsAdmin">
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Super Admin: &nbsp;</label>
                        </div>
                        <div class="col">
                            <input style="margin-left: 50px" wire:model="issuperadmin" class="form-check-input" type="checkbox" name="IsSuperAdmin">
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
