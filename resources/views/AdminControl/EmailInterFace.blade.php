@extends('layouts.controlp') @section('content')



@section('AdminEmail' , 'active')


<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang("control.SamerEmails")</h3>
		</div>
		<p></p>
		<div class="card-body">
		<div>@lang("control.CountEmailNotUseIt"):{{$CountNotUsed}}</div><br>
							
		</div>
	</div>
</div>


<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang("control.AddProxy")</h3>
		</div>
		<p></p>
		<div class="card-body">

		  
			    <div class="form-group">
      <label for="AddEmail">@lang("control.AddEmail")</label>
      <textarea class="form-control" rows="15" id="AddEmail" name="text"></textarea>
    </div>
			 <br>
			<div class="form-group-material">
								<button id="add" onclick="AddIps()" type="button" name="Send Emails"
									class="btn btn-primary">@lang("control.add")</button>
							</div>
							
		</div>
	</div>
</div>


@endsection 
@section('script') 

function SendDataforapi (url ,datasend  , fucntionsSaccsc)
{

		datasend = datasend +'&_token='+ $('meta[name="_token"]').attr('content')
		$.ajax({
		type: 'POST',    
		url: url,
		data: datasend ,
		success: fucntionsSaccsc
			});

}
function isEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
  }
function AddIps () 
{

          var emails = Array();
			 $('#add').prop("disabled",true);

				 $('#AddEmail').val().split("\n").forEach(function(element) {
              if (element.replace(/\s+/g, '')!="" )
			   emails.push( element);

			 } );

			  
           var data =  SendDataforapi ('/api/AddEmailTosystem' ,'add=1&emails='+ JSON.stringify(emails)  , function(msg){
           
		  var dataall = JSON.parse(msg.error);
			var mess = "";
		  	console.log(dataall);
             

			if ( dataall.length> 0){
				  dataall.forEach(function(element) {
					   mess += "<h4>"+element.key+"</h4>"+element.value+'<br><hr><br>';});
            	$.alert({
	    title: '@lang("login.An_error")',
	    content:mess,
	   

	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Ok")',
	            btnClass: 'btn',
	            action: function(){
					$('#add').prop("disabled",false);
	            }
	        }
	        
	    }
	});
            
            }
            else{
      
            	$.alert({
	    title: '@lang("control.AddAll")',
	    content:'@lang("control.AllIsOkay")',
	   

	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Ok")',
	            btnClass: 'btn',
	            action: function(){
						$('#add').prop("disabled",false);
	            }
	        }
	        
	    }
	});
	}
	}
	
	);

	



}


@endsection 