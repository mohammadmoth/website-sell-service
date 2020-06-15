<div class="form-group row">
    <label class="col-sm-3 form-control-label"></label>
    <div class="col-sm-9">
        <div class="form-group">
            <div class="input-group">

                <div class="d-flex flex-row-reverse"> <input @if ( $project->isfinsh )disabled @endif type="button"
                    onclick="EndProject({{$project->id}})" value="End My Project" id="EndProjectbnt" class="btn btn-success"></div>


            </div>
        </div>
    </div>
</div>
