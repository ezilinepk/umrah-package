<!-- Modal-->
<div class="modal fade" id="trgApprovalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation Page</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" action="{{ route('trg.approved') }}" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="trg_paper_id" name="trg_paper_id">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Status <b class="text-danger">*</b></label>
                                <select class="form-control" name="status" id="status" required>
                                    <option value="" selected disabled>Select Options</option>
                                    <option value="reject">Reject</option>
                                    <option value="approaved">Approve</option>
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
                    <div class="form-group senior_instructor" style="display: none">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Senior Instructor <b class="text-danger">*</b></label>
                                <select class="form-control" name="senior_instructor" id="senior_instructor" >
                                    <option value="" selected disabled>Select SI</option>
                                    @foreach($senior_officer as $so)
                                        <option value="{{ $so->id }}">{{ $so->name }}</option>
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
