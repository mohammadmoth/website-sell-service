<div class="form-group row">
    <label class="col-sm-3 form-control-label">Descrption your project</label>
    <div class="col-sm-9">
        <div class="form-group">
            <div class="input-group">


            <textarea @if ( $project->isfinsh )disabled @endif type="text" id="devnotes" name="devnotes" rows="5"  class="form-control">@if(isset($project->data->devnotes)){{$project->data->devnotes}}@endif</textarea>

            </div>
        </div>
    </div>
</div>
