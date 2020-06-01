@extends('layouts.controlp') @section('content')



@section('ProxyHaveBeenDeleta' , 'active')

<br>


<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang("Control.ProxyHasBeenRemoveIt")</h3>
		</div>
		<p></p>
		<div class="card-body">


			    <div class="form-group">
      <label for="ClearAll"">@lang("Control.ClearAll")</label>
      <textarea class="form-control" rows="15" id="ClearAll" name="text">@foreach ($proxies as $proxy){{$proxy}}
@endforeach</textarea>
    </div>
			 <br>
			<div class="form-group-material">
								<button id="add" onclick="ClearAll()" type="button" name="ClearAllSubmit"
									class="btn btn-primary">@lang("Control.ClearAll")</button>
							</div>

		</div>
	</div>
</div>


@endsection
@section('script')

function ClearAll ()
{
    $('#add').prop("disabled",true);
    $.confirm({
        title: 'Confirm deleted',
        content: 'List will be deleted, are you sure?',
        buttons: {
            confirm: function () {
                                var data =  SendDataforapi ('/api/RemoveIpsListDelete','' , function(msg)
                                {

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

                                    }else{

                                                    $.alert({
                                                title: 'Proxies of list deletion has been removed ',
                                                content:'@lang("AllIsOkay")',


                                                typeAnimated: true,
                                                buttons: {
                                                tryAgain: {
                                                    rtl: true,
                                                    text: '@lang("login.Ok")',
                                                    btnClass: 'btn',
                                                    action: function(){
                                                            $('#add').prop("disabled",false);
                                                            location.reload();
                                                    }
                                                }

                                                }
                                                });
                                        }
                                }
                                , function (error){

                                    $.alert({
                                        title: '@lang("login.An_error")',
                                        content:"Error on Server Or Your Connction",
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
                                );

                                            },
                                            cancel: function () {
                                                $('#add').prop("disabled",false);
                                            }
            }
        });


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
