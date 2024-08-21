<!-- Modal-->
<div class="modal fade" id="seniorApprovalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" action="{{ route('senior.approved') }}" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="senior_paper_id" name="senior_paper_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Status <b class="text-danger">*</b></label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="" selected disabled>Select Option</option>
                                    <option value="reject">Reject</option>
                                    <option value="approaved">Approved</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Comments <b class="text-danger">*</b></label>
                                <textarea class="form-control" name="comments" id="comments" required placeholder="Enter Some Comments..." rows="3"></textarea>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group rejectionSenior" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Reject to  <b class="text-danger">*</b></label>
                                <select class="form-control" name="rejection" id="rejection" >
                                    <option value="" selected disabled>Select Option</option>
                                    <option value="trg">Trg Officer</option>
                                    <option value="ds">Ds Officer</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group chief_instructor" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Chief Instructor <b class="text-danger">*</b></label>
                                <select class="form-control" name="chief_instructor" id="chief_instructor" >
                                    <option value="" selected disabled>Select CI</option>
                                    @foreach($chief_officer as $ci)
                                        <option value="{{ $ci->id }}">{{ $ci->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-info font-weight-bold mr-2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-light-success font-weight-bold mr-2"><i class="fa fa-check"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
