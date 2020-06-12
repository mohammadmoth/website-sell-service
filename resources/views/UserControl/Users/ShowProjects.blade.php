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

                    <form action='' method='POST' class="form-horizontal" id='savedata' data-id='{{$project->name}}'>
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
    function Uploadfile () {

        var html = `        <div class='progress' id="progressDivId">
            <div class='progress-bar' id='progressBar'></div>
            <div class='percent' id='percent'>0%</div>
        </div>
        <div style="height: 10px;"></div>`;

    	    $('form.form-horizontal').ajaxForm({
    	      //  target: '#outputImage',
                url: '{{route("uploadfiles")}}',
                type: "post",
                data:{
                    idprject : $("#id").val()

                            },

    	        beforeSubmit: function () {
    	        //	  $("#outputImage").hide();
    	       	   if($("#fileInput").val() == "") {
    	       // 		   $("#outputImage").show();
    	       // 		   $("#outputImage").html("<div class='error'>Choose a file to upload.</div>");
                    return false;
                }
    	            $("#progressDivId").css("display", "block");
    	            var percentValue = '0%';

    	            $('#progressBar').width(percentValue);
    	            $('#percent').html(percentValue);
    	        },
    	        uploadProgress: function (event, position, total, percentComplete) {

    	            var percentValue = percentComplete + '%';
    	            $("#progressBar").animate({
    	                width: '' + percentValue + ''
    	            }, {
    	                duration: 5000,
    	                easing: "linear",
    	                step: function (x) {
                        percentText = Math.round(x * 100 / percentComplete);
    	                    $("#percent").text(percentText + "%");
                        if(percentText == "100") {
                        	   $("#outputImage").show();
                        }
    	                }
    	            });
    	        },
    	        error: function (response, status, e) {
    	            alert('Oops something went.');
    	        },

    	        complete: function (xhr) {
    	            if (xhr.responseText && xhr.responseText != "error")
    	            {
    	            	  $("#outputImage").html(xhr.responseText);
    	            }
    	            else{
    	               	$("#outputImage").show();
        	            	$("#outputImage").html("<div class='error'>Problem in uploading file.</div>");
        	            	$("#progressBar").stop();
    	            }
    	        }
            });

            $('form.form-horizontal').submit();
    }

@endsection
