@extends('layouts.controlp') @section('content')
@section('HomeActive' , '');


@section('AddAdminUserActive' , 'active');
@section('EditAdminUseActive' , '');


<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">Add New User</h3>
		</div>
		<p></p>
		<div class="card-body">
			<form  action='#' class="form-horizontal" id='adduser'>
				@csrf
				<div class="row">
					<label class="col-sm-3 form-control-label">Information Add user</label>
					<div class="col-sm-9">
						<div class="form-group-material">
							<input id="name" type="text" name="name" required
								class="input-material"> <label for="name" class="label-material">Name</label>
						</div>

						<div class="form-group-material">
							<input id="email" type="email" name="email" required
								class="input-material"> <label for="email"
								class="label-material">Email Address </label>
						</div>
						<div class="form-group-material">
							<input id="password" type="password" name="password" required
								class="input-material"> <label for="password"
								class="label-material">Password </label>
						</div>
						<div class="form-group-material">
							<div class="i-checks">
								<input id="emailconfi" type="checkbox" name='emailconfi'
									value="" class="checkbox-template"> <label  for="emailconfi">Send
									E-mail Confing</label>
							</div>
							<div class="form-group-material">
								<button id="regidter" type="submit" name="registerSubmit"
									class="btn btn-primary">Register</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
@section('script')
$("#adduser").submit(function(e) {
event.preventDefault();
    $('#regidter').prop("disabled",true);
$("#adduser").ajaxSubmit({url:'/api/adduser', type: 'post' ,  success :function(data) {
			if ( data.error == 0 )
			{
			$('#email').val("");
			$('#name').val("");
			$('#password').val("");

	$.alert({
	    title: '@lang("login.An_S")',
	    content: '@lang("Control.DescrptionDilogAdminRegest")',


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
              sum += element+' <br>';});

				$.alert({
	    title: '@lang("login.An_error")',
	    content: sum,


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

    });


    setTimeout(function(){
      $('#regidter').prop("disabled",false);}, 500);
});


@endsection
