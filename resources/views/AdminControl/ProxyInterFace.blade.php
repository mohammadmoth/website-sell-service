@extends('layouts.controlp') @section('content')



@section('AdminProxy' , 'active')

<br>
<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang("Control.SamerProxy")</h3>
		</div>
		<p></p>
		<div class="card-body">
		<div>@lang("Control.CountProxyNotUsed"):{{$CountNotUsed}}</div><br>

		</div>
	</div>
</div>


<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang("Control.AddProxy")</h3>
		</div>
		<p></p>
		<div class="card-body">


			    <div class="form-group">
      <label for="AddProxy">@lang("Control.AddProxy")</label>
      <textarea class="form-control" rows="15" id="AddProxy" name="text"></textarea>
    </div>
			 <br>
			<div class="form-group-material">
								<button id="add" onclick="AddIps()" type="button" name="AddSubmit"
									class="btn btn-primary">@lang("Control.add")</button>
							</div>

		</div>
	</div>
</div>

<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang("Control.DelProxy")</h3>
		</div>
		<p></p>
		<div class="card-body">


			    <div class="form-group">
      <label for="DelProxy">@lang("Control.DelProxy")</label>
      <textarea class="form-control" rows="15" id="DelProxy" name="text"></textarea>
    </div>
			 <br>
			<div class="form-group-material">
								<button id="del" onclick="Del()"  type="button" name="delSubmit"
									class="btn btn-primary">@lang("Control.del")</button>
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

function AddIps ()
{

          var proxies = Array();
			 $('#add').prop("disabled",true);

				 $('#AddProxy').val().split("\n").forEach(function(element) {
               if (element.replace(/\s+/g, '')!="")
				proxies.push( element);

			 } );


           var data =  SendDataforapi ('/api/AddProxyTosystem' ,'add=1&proxy='+ JSON.stringify(proxies)  , function(msg){

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
	    title: '@lang("proxyAddAll")',
	    content:'@lang("AllIsOkay")',


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


function Del ()
{

          var proxies = Array();
			 $('#del').prop("disabled",true);

				 $('#DelProxy').val().split("\n").forEach(function(element) {
               if (element.replace(/\s+/g, '')!="")
				proxies.push( element);

			 } );


           var data =  SendDataforapi ('/api/RemoveIpsFromList' ,'del=1&iplist='+ JSON.stringify(proxies)  , function(msg){

		  var dataall = JSON.parse(msg.error);
			var mess = "";



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
					     $('#del').prop("disabled",false);
	            }
	        }

	    }
	});

            }
            else{
      $('#del').prop("disabled",false);
            	$.alert({
	    title: '@lang("No Any Infromation Del From Users")',
	    content:'@lang("All Is Okay")',


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
	}
	}

	);





}
@endsection
