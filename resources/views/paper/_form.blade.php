<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label class="form-label" for="category_id">Cat  <b class="text-danger">*</b></label>
            <select class="form-control select2" name="category_id" id="category_id" required>
                <option value="" selected disabled>Select Option</option>
                @foreach($category as $cat)
                    <option value="{{ $cat->id }}" @isset($detail->category_id) {{ ($detail->category_id == $cat->id) ? "selected" : '' }} @endisset>{{ ucwords($cat->name) }}</option>
                @endforeach
            </select>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="course_name">Course <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="course_name" id="course_name" value="@isset($detail->course_name) {{ $detail->course_name}} @endisset" placeholder="Enter Course Name..." required>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="module_name">Module/ Paper <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="module_name" id="module_name" value="@isset($detail->module_name) {{ $detail->module_name}} @endisset" placeholder="Enter Module Name..." required>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label class="form-label" for="mos">MOS <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="mos" id="mos" value="@isset($detail->mos) {{ $detail->mos}} @endisset" placeholder="Enter MOS..." required>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="name">Exam Time <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="name" id="name" value="@isset($detail->name) {{ $detail->name}} @endisset" placeholder="Enter Subject Name..." required>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
    </div>
</div>  

<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label class="form-label" for="date">Exam Date <b class="text-danger">*</b></label>
            <input type="date" class="form-control" name="date" id="date" value="@isset($detail->date){{ $detail->date}}@endisset" required>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="trg_officer"> Select Dept/Trg Offr </label>
            <select class="form-control select2" name="trg_officer" id="trg_officer" >
                <option value="" selected disabled>Select Option</option>
                @foreach($trg_officer as $trg)
                    <option value="{{ $trg->id }}" @isset($detail->approved_by_trg) {{ ($detail->approved_by_trg == $trg->id) ? "selected" : '' }} @endisset>{{ ucwords($trg->name) }}</option>
                @endforeach
            </select>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label" for="publish"> Forward <b class="text-danger">*</b></label>
            <select class="form-control" name="publish" id="publish" required>
                <option value="">Select Option</option>
                <option value="yes" @isset($detail->publish) {{($detail->publish == 'yes') ? 'selected' : ''}} @endisset>Yes</option>
                <option value="no" @isset($detail->publish) {{($detail->publish == 'no') ? 'selected' : ''}} @endisset>No</option>
            </select>

            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                This Field is Required.
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr style="background-color: #3699FF; color: white;">
                    <td><center>Upload Files</center></td>
                </tr>
            </table>
            <table class="table table-bordered table-stripped">
                <thead>
                    <th style="width: 55%;">Description</th>
                    <th style="width: 40%;">File</th>
                    <th><a href="javascript:void(0);" class="uploadFile btn btn-sm btn-light-success"><i class="fa fa-plus"></i></a></th>
                </thead>
                <tbody id="UploadFileBody">
                    @isset($detail->file)
                        @foreach($detail->file as $item)
                            <tr>
                                <td><textarea class="form-control" id="description" name="description[]" placeholder="Enter Some Description..." rows="1">{{ $item->description }}</textarea></td>
                                <td>
                                    {{ $item->file }}
                                    <input type="hidden" name="saveFile[]" value="{{ $item->file }}">
                                    <input type="hidden" name="uploadType[]" value="{{ $item->type }}">
                                </td>
                                <td><a href="javascript:void(0);" class="remCF btn btn-sm btn-light-danger"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    @endisset
                    @if(Route::is('paper.create')) 
                        <tr>
                            <td><textarea class="form-control" id="description" name="description[]" placeholder="Enter Some Description..." rows="1"></textarea></td>
                            <td><input type="file" name="file[]" class="form-control"></td>
                            <td><a href="javascript:void(0);" class="remCF btn btn-sm btn-light-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endif    
                </tbody>
            </table>
        </div>
    </div>
</div>
