<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createAppointmentModal" tabindex="-1" aria-labelledby="createAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createAppointmentModalLabel" style="color: black">Create Appointment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div style="color:red; text-align: center;padding:10px">@error('error') {{ $message }} @enderror</div>
        <form wire:submit.prevent="save" action="">
            <div class="modal-body">

                <div class="row">
                    <div style="width: 60%;margin:auto">

                        @error('child')
                            <div style="color:red; text-align: center;padding:10px">@error('child') {{ $message }} @enderror</div>
                        @enderror

                    <select class="form-select @error('child')is-invalid @enderror" wire:model.live="child" required>

                        <option value="">Select a Child</option>
                        @foreach ($children as $child)
                        <option value="{{ $child->StudentID }}">{{ $child->FirstName }} {{ $child->LastName }}</option>
                        @endforeach

                    </select>
                    </div>

                </div>

                @if ($this->child)
                    <div class="row" style="margin-top: 30px">
                        <div style="text-align:center">
                            <p>Select the sessions your child will be attending</p>
                        </div>

                    </div>

                    <div>
                        <table style="margin: auto">
                            @forelse ($classes as $index => $class)
                            <tr>
                                <td>{{$class['StartTime']}} - {{$class['EndTime']}} &nbsp;</td>
                                <td>
                                    <input wire:click="toggleSelected({{$index}})" type="checkbox" class="btn-check" id="btn-check-mc{{$index}}" checked>
                                    <label style="margin-top: 5px" class="btn btn-outline-success" for="btn-check-mc{{$index}}"><i class="bi bi-check-lg"></i></label>
                                </td>
                            </tr>
                            @empty
                            <p style="text-align: center;color:red">There are no classes on this date</p>
                            @endforelse
                        </table>

                        {{-- <div class="col" style="margin-left:700px">
                            <button wire:click="save" class="btn btn-primary btn-icon-split" style="width: 8rem;margin:auto">
                                <span class="icon text-white-50">
                                    <i class="bi bi-floppy2-fill" style="color: white"></i>
                                </span>
                                <span class="text"  style="width: 200px;">Save</span>
                            </button>
                        </div> --}}
                    </div>
                @endif
            </div>
            <div class="modal-footer" style="align-items: center">
                <div style="margin:auto">
                    <button @disabled(!$this->child) class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
      </div>
    </div>
</div>
