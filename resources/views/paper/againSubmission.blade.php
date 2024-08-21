<!-- Modal-->
<div class="modal fade" id="againSubmissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form method="post" action="{{ route('paper.againSubmission') }}" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="submission_id" name="submission_id">
                    <p>Are You Sure you want to Submit Again this Paper?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-info font-weight-bold mr-2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-light-success font-weight-bold mr-2"><i class="fa fa-forward"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
