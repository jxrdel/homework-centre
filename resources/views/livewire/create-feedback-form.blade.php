<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createFeedbackModal" tabindex="-1" aria-labelledby="createFeedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createFeedbackModalLabel" style="color: black; text-align:center">Send Feedback</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="createFeedback" action="">
            <div class="modal-body" style="color: black">
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Compliments: &nbsp;</label>
                        </div>
                        <div class="col">
                            {{-- <input class="form-control" wire:model="compliments" type="text" style="width: 70%;color:black;margin-left:50px" required> --}}
                            <textarea style="color: black"wire:model="compliments" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Complaints: &nbsp;</label>
                        </div>
                        <div class="col">
                            <textarea style="color: black" wire:model="complaints" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">

                    <div class="col" style="display: flex;margin-left: 80px">
                        <div class="col-3">
                            <label style="margin-top:5px;" for="title">Suggestions: &nbsp;</label>
                        </div>
                        <div class="col">
                            <textarea style="color: black"wire:model="suggestions" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                
                <div class="row" style="margin-top:10px">
                    <div class="col" style="display: flex;text-align:center">
                        <div class="col">
                            <label style="margin-top:5px;font-size:1rem" for="satisfaction"><strong>In terms of the Centre's activities, I am:</strong> &nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="display: flex;">
                        <div class="col" style="text-align:center">
                            <div class="form-check form-check-inline">
                                <input required wire:model="activitysatisfaction" class="form-check-input" type="radio" name="activitysatisfaction" value="Very Satisfied">
                                <label class="form-check-label">Very Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="activitysatisfaction" class="form-check-input" type="radio" name="activitysatisfaction" value="Satisfied">
                                <label class="form-check-label">Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="activitysatisfaction" class="form-check-input" type="radio" name="activitysatisfaction" value="Dissatisfied">
                                <label class="form-check-label">Dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="activitysatisfaction" class="form-check-input" type="radio" name="activitysatisfaction" value="Very Dissatisfied">
                                <label class="form-check-label">Very Dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="activitysatisfaction" class="form-check-input" type="radio" name="activitysatisfaction" value="Neither Satisfied nor Dissatisfied">
                                <label class="form-check-label">Neither Satisfied nor Dissatisfied</label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="border-top: 1px solid;">
                
                <div class="row">
                    <div class="col" style="display: flex;text-align:center">
                        <div class="col">
                            <label style="margin-top:5px;font-size:1rem" for="satisfaction"><strong>Overall, I am:</strong> &nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="display: flex;">
                        <div class="col" style="text-align:center">
                            <div class="form-check form-check-inline">
                                <input required wire:model="overallsatisfaction" class="form-check-input" type="radio" name="overallsatisfaction" value="Very Satisfied">
                                <label class="form-check-label">Very Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="overallsatisfaction" class="form-check-input" type="radio" name="overallsatisfaction" value="Satisfied">
                                <label class="form-check-label">Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="overallsatisfaction" class="form-check-input" type="radio" name="overallsatisfaction" value="Dissatisfied">
                                <label class="form-check-label">Dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="overallsatisfaction" class="form-check-input" type="radio" name="overallsatisfaction" value="Very Dissatisfied">
                                <label class="form-check-label">Very Dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="overallsatisfaction" class="form-check-input" type="radio" name="overallsatisfaction" value="Neither Satisfied nor Dissatisfied">
                                <label class="form-check-label">Neither Satisfied nor Dissatisfied</label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr style="border-top: 1px solid;">
                
                
                <div class="row">
                    <div class="col" style="display: flex;text-align:center">
                        <div class="col">
                            <label style="margin-top:5px;font-size:1rem" for="satisfaction"><strong>I believe my child is / children are:</strong> &nbsp;</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="display: flex;">
                        <div class="col" style="text-align:center">
                            <div class="form-check form-check-inline">
                                <input required wire:model="childsatisfaction" class="form-check-input" type="radio" name="childsatisfaction" value="Very Satisfied">
                                <label class="form-check-label">Very Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="childsatisfaction" class="form-check-input" type="radio" name="childsatisfaction" value="Satisfied">
                                <label class="form-check-label">Satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="childsatisfaction" class="form-check-input" type="radio" name="childsatisfaction" value="Dissatisfied">
                                <label class="form-check-label">Dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="childsatisfaction" class="form-check-input" type="radio" name="childsatisfaction" value="Very Dissatisfied">
                                <label class="form-check-label">Very Dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input wire:model="childsatisfaction" class="form-check-input" type="radio" name="childsatisfaction" value="Neither Satisfied nor Dissatisfied">
                                <label class="form-check-label">Neither Satisfied nor Dissatisfied</label>
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
