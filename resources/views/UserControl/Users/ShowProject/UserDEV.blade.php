<div class="form-group row">
    <label class="col-sm-3 form-control-label">Notes From Freelancer</label>
    <div class="col-sm-9">
        <div class="form-group">
            <div class="input-group">


                    <textarea @if ( $project->isfinsh )disabled @endif type="text" id="usernotes" name="usernotes"   rows="5"  class="form-control">@if(isset($project->data->usernotes)){{$project->data->usernotes}}@endif</textarea>

            </div>
        </div>
    </div>
</div>
