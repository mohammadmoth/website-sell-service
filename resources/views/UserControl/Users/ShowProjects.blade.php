@extends('layouts.controlp')

@section('ShowProjects' , 'active')

@section('content')



<br>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Projects</h3>
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

                    <form action='' method='POST' class="form-horizontal" id='savedata{{$project->id}}'
                        data-id='{{$project->name}}'>
                        @csrf

                        <input type="hidden" name='id' value='{{$project->id}}'>



                        <div class='card-body'>

                            @include('UserControl.Users.ShowProject.SaveSettings')
                            <hr>
                            @include('UserControl.Users.ShowProject.UserNote')
                            <hr>
                            @include('UserControl.Users.ShowProject.UserDEV')
                            <hr>
                            @include('UserControl.Users.ShowProject.UploadFilesAndShow')
                            <hr>
                            @include('UserControl.Users.ShowProject.EndProject')
                            <hr>
                            @include('UserControl.Users.ShowProject.RemoveProject')
                            <hr>

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
    function Save (btn ,id ) {

        var html = ``;

    	    $('#savedata'+id).ajaxForm({
    	      //  target: '#outputImage',
                url: '{{route("saveproject")}}',
                type: "post",
                data:{
                    idprject : $("#id").val()

                            },

    	        beforeSubmit: function () {

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

                          console.log(xhr.responseText);
                         location.reload();
    	            }
    	            else{

    	            }
    	        }
            });

           $('#savedata'+id).submit();
    }
    function Uploadfile (btn ,id ) {
        if($(btn).val() == "") {

                    return false;
                }
        var html = ``;

    	    $('#savedata'+id).ajaxForm({
    	      //  target: '#outputImage',
                url: '{{route("uploadfiles")}}',
                type: "post",
                data:{
                    idprject : $("#id").val()

                            },

    	        beforeSubmit: function () {
    	        //	  $("#outputImage").hide();
    	       	   if($(btn).val() == "") {
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

                          console.log(xhr.responseText);
                          location.reload();
    	            }
    	            else{
    	               	$("#outputImage").show();
        	            	$("#outputImage").html("<div class='error'>Problem in uploading file.</div>");
        	            	$("#progressBar").stop();
    	            }
    	        }
            });

           $('#savedata'+id).submit();
    }
function SendDataforapi (url ,datasend  , fucntionsSaccsc , errorx)
{

		datasend = datasend +'&_token='+ $('meta[name="_token"]').attr('content')
		$.ajax({
		type: 'POST',
		url: url,
		data: datasend ,
        success: fucntionsSaccsc,
        error:errorx
			});

}


    function RemoveMyproject (id)
    {
        var bntname = $('#RemoveMyprojectX');
        bntname.prop("disabled",true);
    $.confirm({
        title: 'Delete this project',
        content: 'Do you agree to permanently delete this project?, are you sure?',
        buttons: {
            confirm: function () {
                                var data =  SendDataforapi ('{{route("removeprojectapi")}}','id='+id , function(msg)
                                {

                                    var mess = "";


                                        if ( msg.error> 0){

                                                msg.data.forEach(function(element) {
                                                            mess += element+'<br><hr>';});
                                            $.alert({
                                        title: 'An error!',
                                        content:mess,


                                        typeAnimated: true,
                                        buttons: {
                                        tryAgain: {
                                            rtl: true,
                                            text: 'Ok',
                                            btnClass: 'btn',
                                            action: function(){
                                                bntname.prop("disabled",false);

                                            }
                                        }

                                        }
                                        });

                                    }else{

                                                    $.alert({
                                                title: 'Delete this project ',
                                                content:'All Is Okay',


                                                typeAnimated: true,
                                                buttons: {
                                                tryAgain: {
                                                    rtl: true,
                                                    text: 'Ok',
                                                    btnClass: 'btn',
                                                    action: function(){
                                                        bntname.prop("disabled",false);
                                                            location.reload();
                                                    }
                                                }

                                                }
                                                });
                                        }
                                }
                                , function (error){

                                    $.alert({
                                        title: 'An error!',
                                        content:"Error on Server Or Your Connction",
                                        typeAnimated: true,
                                        buttons: {
                                        tryAgain: {
                                            rtl: true,
                                            text: 'Ok',
                                            btnClass: 'btn',
                                            action: function(){
                                                bntname.prop("disabled",false);
                                            }
                                        }

                                        }
                                        });


                                }
                                );

                                            },
                                            cancel: function () {
                                                bntname.prop("disabled",false);
                                            }
            }
        });





    }
    function EndProject (id){
        var bntname = $('#EndProjectbnt');
        bntname.prop("disabled",true);
    $.confirm({
        title: 'End this project',
        content: 'Do you agree to end this project?, are you sure?',
        buttons: {
            confirm: function () {
                                var data =  SendDataforapi ('{{route("endprojectapi")}}','id='+id , function(msg)
                                {


                                    var mess = "";



                                    if ( msg.error> 0){

                                        msg.data.forEach(function(element) {
                                                    mess += element+'<br><hr>';});
                                            $.alert({
                                        title: 'An error!',
                                        content:mess,


                                        typeAnimated: true,
                                        buttons: {
                                        tryAgain: {
                                            rtl: true,
                                            text: 'Ok',
                                            btnClass: 'btn',
                                            action: function(){
                                                bntname.prop("disabled",false);

                                            }
                                        }

                                        }
                                        });

                                    }else{

                                                    $.alert({
                                                title: 'The Project ',
                                                content:'The Project Has been ended',


                                                typeAnimated: true,
                                                buttons: {
                                                tryAgain: {
                                                    rtl: true,
                                                    text: 'Ok',
                                                    btnClass: 'btn',
                                                    action: function(){
                                                        bntname.prop("disabled",false);
                                                            location.reload();
                                                    }
                                                }

                                                }
                                                });
                                        }
                                }
                                , function (error){

                                    $.alert({
                                        title: 'An error!',
                                        content:"Error on Server Or Your Connction",
                                        typeAnimated: true,
                                        buttons: {
                                        tryAgain: {
                                            rtl: true,
                                            text: 'Ok',
                                            btnClass: 'btn',
                                            action: function(){
                                                bntname.prop("disabled",false);
                                            }
                                        }

                                        }
                                        });


                                }
                                );

                                            },
                                            cancel: function () {
                                                bntname.prop("disabled",false);
                                            }
            }
        });





    }


@endsection
