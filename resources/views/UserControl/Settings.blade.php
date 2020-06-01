@extends('layouts.controlp') @section('content')


@section('SettingsUserActive' , 'active')<br>



<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang('Control.Add_Your_Username')</h3>




		</div>
		<p></p>

		<div class="card-body">
			<form  action='' method = 'POST' class="form-horizontal" id='adduser'>
				@csrf
				<div class="row">


					<label class="col-sm-3 form-control-label" >@lang('Control.Settings') </label>

						<div class="col-sm-9">
						<!--
						<div class="form-group-material">
						<input id="Cookie" type="text" name="Cookie" required value = ''
						class="input-material"> <label for="Cookie" class="label-material">@lang('Control.Cookie ae_auth')</label>
						</div>
						-->
						<div class="form-group-material">
						<input id="username" type="text" name="username" required value = '{{$username}}'
						class="input-material"> <label for="username" class="label-material" title="We ask for your age only for statistical purposes." >@lang('Control.username') </label>
						</div>

						<div class="form-group-material">
						<input id="password" type="password" name="password" required value = ''
						class="input-material"> <label for="password" class="label-material">@lang('Control.password')</label>
						</div>

						<div class="form-group-material">
						<button id="SendData" type="submit" name="SendData"
						class="btn btn-primary">@lang('Control.SendData')</button>
						<button id="UpDateWorld" type="button" onclick='SendupdateWorld()'
						class="btn btn-primary">@lang('Control.UpDateWorld')</button>
						</div>



						</div>
					</div>

			</form>
			</div>
		</div>
	</div>


@endsection
@section('script')
var translaterword ={
	Iperror:"@lang('Control.Iperror')",
	NoIpControll:"@lang('Control.NoIpControll')",
	LoginGame:"@lang('Control.LoginGame')",
	UserNameOrPasswordwrong:"@lang('Control.UserNameOrPasswordwrong')",
	NoAnyIPadded:"@lang('Control.NoAnyIPadded')",
	Errorloginorsomewhere:"@lang('Control.Errorloginorsomewhere')",
	CAN_NOT_CHANGE_USERNAME_PLEASE_TELL_ADMIN:"@lang('Control.CAN_NOT_CHANGE_USERNAME_PLEASE_TELL_ADMIN')",
};
function SendupdateWorld() {
$('#UpDateWorld').attr("disabled", true);

$.get({url:'/api/UpdateWorldsforUser', type: 'get' ,  success :function(data) {
			if ( data.error == 0 )
			{
			 $('#UpDateWorld').removeAttr("disabled");

	$.alert({
	    title: '@lang("Control.update_world_UpDateWorld")',
	    content: '@lang("Control.update_world_DescrptionDilogSecsses")',


	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Ok")',
	            btnClass: 'btn',
	            action: function(){
	            }
	        }

	    }
	});


			}else
			{
				var sum ='';
			 data.data.forEach(function(element) {

              sum += translaterword[element]+' <br>';});
             $('#SendData').removeAttr("disabled");
				$.alert({
	    title: '@lang("login.An_error")',
	    content: sum ,


	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Try_again")',
	            btnClass: 'btn',
	            action: function(){
	            }
	        }

	    }
	});

			}


    }

    , error :function(data){
    			 $('#UpDateWorld').removeAttr("disabled");

    $.alert({
	    title: '@lang("login.An_F")',
	    content: '@lang("Control.ErrorContions")',


	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Ok")',
	            btnClass: 'btn',
	            action: function(){
	            }
	        }

	    }
	});


    }} );


   /* setTimeout(function(){
      $('#UpDateWorld').prop("disabled",false);}, 15000);*/

}
$("#adduser").submit(function(e) {
event.preventDefault();    $('#SendData').attr("disabled", true);
    $('#regidter').prop("disabled",true);
$("#adduser").ajaxSubmit({url:'/api/SaveSettingsUser', type: 'post' ,  success :function(data) {
			if ( data.error == 0 )
			{
			 $('#SendData').removeAttr("disabled");

	$.alert({
	    title: '@lang("login.An_S")',
	    content: '@lang("Control.DescrptionDilogSecsses")',


	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Ok")',
	            btnClass: 'btn',
	            action: function(){
	            }
	        }

	    }
	});


			}else
			{
				var sum ='';
			 data.data.forEach(function(element) {

              sum += translaterword[element]+' <br>';});
             $('#SendData').removeAttr("disabled");
				$.alert({
	    title: '@lang("login.An_error")',
	    content: sum ,


	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Try_again")',
	            btnClass: 'btn',
	            action: function(){
	            }
	        }

	    }
	});

			}


    }

    , error :function(data){
    			 $('#SendData').removeAttr("disabled");

    $.alert({
	    title: '@lang("login.An_F")',
	    content: '@lang("Control.ErrorContions")',


	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Ok")',
	            btnClass: 'btn',
	            action: function(){
	            }
	        }

	    }
	});


    }} );


    setTimeout(function(){
      $('#regidter').prop("disabled",false);}, 500);
});




@endsection
