<!-- Modal-->
<div class="modal fade" id="chiefApprovalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" action="{{ route('chief.approved') }}" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="chief_paper_id" name="chief_paper_id">
                    <input type="hidden" name="final_status" id="final_status">
                    <p>Are you sure want to <span id="textStatus"></span> this paper?</p> 
                    <div class="form-group rejectionChief" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Reject to  <b class="text-danger">*</b></label>
                                <select class="form-control" name="rejection" id="rejection" >
                                    <option value="" selected disabled>Select Option</option>
                                    <option value="senior">Senior Instructor</option>
                                    <option value="trg">Trg Officer</option>
                                    <option value="ds">Ds Officer</option>
                                </select>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Comments <b class="text-danger">*</b></label>
                                <textarea class="form-control" name="comments" id="comments" required placeholder="Enter Some Comments..." rows="3" required></textarea>
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-info font-weight-bold mr-2" data-dismiss="modal">Close</button>
                    <button type="submit" id="ciStatusBtn" class="btn btn-light-primary font-weight-bold mr-2"><i class="fa fa-check"></i> Approved</button>
                </div>
            </form>
        </div>
    </div>
</div>
