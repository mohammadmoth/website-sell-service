@extends('layouts.controlp')

@section('ShowProjects' , 'active')

@section('content')



<br>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">@lang('Control.Projects')</h3>
        </div>
        <p></p>
        <div class="card-body">
            <ul class="nav nav-tabs nav-justified">
                @foreach ($projects as $project)
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#{{$project->id}}">{{$project->name}}</a>
                </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($projects as $project)
                <div id="{{$project->id}}" class="tab-pane fade " style='display: nono'>

                    <form action='' method='POST' class="form-horizontal" id='' data-id='{{$project->name}}'>
                        @csrf

                        <input type="hidden" name='id' value='{{$project->id}}'>
                        <!--               Start Theif            -->
                        <div class='card-body'>

                            @include('UserControl.Users.ShowProject.UserNote')
                            <hr>
                            @include('UserControl.Users.ShowProject.UserDEV')
                            <hr>
                            @include('UserControl.Users.ShowProject.UploadFilesAndShow')
                            <hr>


                            <!--
                                devnotes
                                usernotes

                            -->
                        </div>


                    </form>
                </div>
                @endforeach




            </div>
        </div>
    </div>
</div>


@endsection


@section('script')

</script>



<script>
    function Sendfile()
    {
       var html = `<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>

<div id="status"></div>`;



$.ajax({
    xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
            if (evt.lengthComputable) {
                var percentComplete = (evt.loaded / evt.total) * 100;
                //Do something with upload progress here
            }
       }, false);
       return xhr;
    },
    type: 'POST',
    url: "{{route("uploadfiles")}}",
    data: {},
    success: function(data){
        //Do something on success
    }
});

var bar = $('#bar');
    var percent = $('#percent');
    var status = $('#status');

    $('form').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
        }
    });

    }
@endsection
