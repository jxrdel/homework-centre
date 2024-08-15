<!-- Modal -->
<div wire:ignore.self class="modal fade" id="joinWaitingListModal" tabindex="-1" aria-labelledby="joinWaitingListModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="joinWaitingListModalLabel" style="color: black">Join Waiting List</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div style="color:red; text-align: center;padding:10px">@error('error') {{ $message }} @enderror</div>
        <form wire:submit.prevent="joinWaitingList" action="">
            <div class="modal-body">

                <div wire:ignore class="row">
                    <div style="width: 60%;margin:auto">


                    <select style="width: 100%" id="studentSelectWL" class="form-select" wire:model.live="student" required>

                        <option value="">Select a Child</option>
                        @foreach ($children as $child)
                        <option value="{{ $child->StudentID }}">{{ $child->FirstName }} {{ $child->LastName }}</option>
                        @endforeach

                    </select>
                    </div>

                </div>
                
                @error('student')
                    <div style="color:red; text-align: center;padding:10px">@error('student') {{ $message }} @enderror</div>
                @enderror
            
            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button @disabled(!$this->student) class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
