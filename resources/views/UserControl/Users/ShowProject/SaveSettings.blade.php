<div class="d-flex flex-row-reverse"> <input @if ( $project->isfinsh )disabled @endif type="button" onclick="Save(this,{{$project->id}})" value="save"
    id="save" class="btn"></div>
