<div class="form-group row">
    <label class="col-sm-3 form-control-label">Files</label>
    <div class="col-sm-9">
        <div class="form-group">
            <div class="input-group">

                <div class="form-group row">
                    <label for="file" class="col-sm-3 form-control-label">File input</label>
                    @foreach ($project->files as $fileName => $filePath)
                    <div class="col-sm-9">
                        <a href="/{{$filePath}}">{{$fileName}} </a>
                    </div>
                    @endforeach

                </div>


            </div>
        </div>
    </div>

    <label class="col-sm-3 form-control-label"></label>
    <div class="col-sm-9">
        <div class="form-group">
            <div class="input-group">

                <div class="form-group row">
                    <label for="file" class="col-sm-3 form-control-label">File input</label>
                    <div class="col-sm-9">

                        <input id="file" name="file[]" type="file" accept=".jpg, .jpeg, .png" multiple
                            onchange="Uploadfile()" class="form-control-file">

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
