@extends('layouts.controlp') @section('content')

@section('Director' , 'active')
<style>
.modal-dialog {
    max-width: 790px;

}


.lds-hourglass {
    display: inline-block;
    width: 100px;
    height: 80px;
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
	z-index: 2147483647;
}
.lds-hourglass:after {
    content: " ";
    display: block;
    border-radius: 50%;
    width: 0;
    height: 0;
    margin: 7px;
    box-sizing: border-box;
    border: 65px solid #fff;
    border-color: #ab92f4 #00000099 #ab92f4 #000000ab;
    animation: lds-hourglass 2s infinite;
}
@keyframes lds-hourglass {
  0% {
    transform: rotate(0);
    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }
  50% {
    transform: rotate(900deg);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  100% {
    transform: rotate(1800deg);
  }
}











.lds-spinner {
  display: inline-block;
    width: 100px;
    height: 80px;
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    margin: auto;
	z-index: 2147483647;
}
.lds-spinner div {
  transform-origin: 32px 32px;
  animation: lds-spinner 1.2s linear infinite;
}
.lds-spinner div:after {
  content: " ";
    display: block;
    position: absolute;
    top: -65px;
    left: 0px;
    width: 5px;
    height: 60px;
    border: 10px solid #000;
    margin: 0px;
    border-radius: 20%;
    background: #ab92f4;
}
.lds-spinner div:nth-child(1) {
  transform: rotate(0deg);
  animation-delay: -1.1s;
}
.lds-spinner div:nth-child(2) {
  transform: rotate(30deg);
  animation-delay: -1s;
}
.lds-spinner div:nth-child(3) {
  transform: rotate(60deg);
  animation-delay: -0.9s;
}
.lds-spinner div:nth-child(4) {
  transform: rotate(90deg);
  animation-delay: -0.8s;
}
.lds-spinner div:nth-child(5) {
  transform: rotate(120deg);
  animation-delay: -0.7s;
}
.lds-spinner div:nth-child(6) {
  transform: rotate(150deg);
  animation-delay: -0.6s;
}
.lds-spinner div:nth-child(7) {
  transform: rotate(180deg);
  animation-delay: -0.5s;
}
.lds-spinner div:nth-child(8) {
  transform: rotate(210deg);
  animation-delay: -0.4s;
}
.lds-spinner div:nth-child(9) {
  transform: rotate(240deg);
  animation-delay: -0.3s;
}
.lds-spinner div:nth-child(10) {
  transform: rotate(270deg);
  animation-delay: -0.2s;
}
.lds-spinner div:nth-child(11) {
  transform: rotate(300deg);
  animation-delay: -0.1s;
}
.lds-spinner div:nth-child(12) {
  transform: rotate(330deg);
  animation-delay: 0s;
}
@keyframes lds-spinner {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">


<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang('Control.Director')</h3>
		</div>
		<p></p>
		<div class="card-body">


<div id="app" >
<alldata></alldata>
</div>

</div>
</div>
</div>

<div id="myModalx" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">


      <div class="form-group">

        <input type="text" class="form-control input-material" id="nameusers" required="" placeholder="name">
          <input type="hidden" id="idusers">
      </div>

      <div class="form-group">
         <input type="text" class="form-control input-material" id="Emailusers" required="" placeholder="Email">
      </div>
       <div class="form-group">
    <label for="Status">Select Plan</label>
    <select class="form-control input-material" id="Statususers" required="" "status"="">
  	 @foreach ($plans as $plan)
      <option value ='{{$plan->id}}'>@lang('Control.'.$plan->name)</option>

      @endforeach
    </select>
    <div class="form-group">
    Ip/s
                            <textarea  multiple="" rows="5" id='ipsall' class="form-control">

                            </textarea >
                          </div>

      </div>
      <div class="form-group">
          <label for="Status">Set end of subscription Date</label>
          <div class="input-group date datetimepickerx" id="datetimepicker1" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                  <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
          </div>
        </div>



          </div>

        <!-- Modal footer -->
        <div class="modal-footer">
         <div class="btn-group">
          <button type="button"  id ='buttenlogin' data-id = '' onclick = "loginbyuser()"  class="btn btn-success">@lang('Control.login')</button>
           <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" onclick='$("#worldbuttonxx").toggle();' data-toggle="">
                        <span class="caret"></span>
                      </button>
          <div id='worldbuttonxx' class="dropdown-menu">
          <a class="dropdown-item"   onclick = "loginbybrowser()"  target="_blank">@lang('Control.loginByBrowser')</a>
          <a class="dropdown-item"   onclick = "loginbybrowserX()"  target="_blank">@lang('Control.loginByBrowserNoProxy')</a>


                      </div>
          </div>
          <button type="button" onclick="Suppress()" id="suppress" class="btn btn-warning">@lang('Control.suppress')</button>
          <button type="button" onclick="Delete()" id="Delete" class="btn btn-danger">Delete</button>
          <button type="button" onclick="AddIps()" class="btn btn-danger">@lang('Control.AddIps')</button>
          <button type="submit" onclick="saveuser()"  class="btn btn-success" data-dismiss="modal">@lang('Control.save')</button>
                               <div class="btn-group">
					  <button type="button"  class="btn btn-primary">World</button>

                      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" onclick='$("#worldbutton").toggle();' data-toggle="">
                        <span class="caret"></span>
                      </button>
                      <div id='worldbutton' class="dropdown-menu">


                      </div>
                    </div>
          <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal">@lang('Control.Close')</button>
        </div>



      </div>
    </div>
  </div>


<script src = "{{asset('js/app.js')}}" ></script>

@endsection
@section('script')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
$('#sandbox-container input').datepicker({
    format: "dd/mm/yyyy",
    startDate :moment().subtract(0,'d').format('DD/MM/YYYY'),

	orientation: "bottom auto",
	language: "en"
});
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


function ShowData(elant)
{
 $("#Emailusers").removeClass("is-invalid");
$('#ipsall').empty();

  var id = $(elant).attr("data-id");
  var name = $(elant).attr("data-name");
    var email = $(elant).attr("data-email");
      var status = $(elant).attr("data-plan_id");
      var suppress = $(elant).attr("data-status");
      var subscribes = $(elant).attr("data-subscribes");
      var worlds = JSON.parse( $(elant).attr("data-worlds"));


      try{
var Ips =  JSON.parse( $(elant).attr("data-ips"));
} catch (e) {var Ips = null;}
		$("#worldbutton").empty();
		var htmlinput = "";

		worlds.forEach(function(element) {
 htmlinput += '<a class="dropdown-item" href="/dashboard/GetAllData?idworld='+element.id+'"  target="_blank">'+element.nameworld+'</a>' ;
});
    $("#worldbutton").append(htmlinput);
    $("#nameusers").val(name);
    $("#Emailusers").val(email);
    $("#Statususers").val(status);
    $("#idusers").val(id);
    $("#datetimepicker1").datetimepicker('date', moment(subscribes,"YYYY-MM-DD HH:mm:ss").format("DD.MM.YYYY, HH:mm:ss") );
    $("#buttenlogin").attr("data-id" , id);
    if ( suppress == 1 )
    $("#suppress").html("unsuppress");
    else
    $("#suppress").html("suppress");

		if ( Ips != null )
	Ips.forEach(function(element) {


	$('#ipsall').append(element.ip+'\n');
	});
     $('#myModalx').modal('show');

}
function loginbybrowser()
{
var i = $("#buttenlogin").attr("data-id");


$.ajax({
   type: 'GET',
url: '/Sendtobrowser?id='+ i,
success: function(data){
if ( !data.error )
location.href=data.data;
}

     });


}

function loginbybrowserX()
{
var i = $("#buttenlogin").attr("data-id");


$.ajax({
   type: 'GET',
url: '/SendtobrowserX?id='+ i,
success: function(data){
if ( !data.error )
location.href=data.data;
}

     });


}

function loginbyuser ()
{
var i = $("#buttenlogin").attr("data-id");
window.open('/Sendtouser?id='+ i , '_blank');

}

function Delete()
{


            var id =  $("#idusers").val();
            var data =  SendDataforapi ('/api/Delete' ,'id='+ id , function(msg){

           ///edit code!
            $('#myModalx').modal('hide');
           ///edit code!
			console.log(msg);
      location.reload();
            });



}
function Suppress()
{


            var id =  $("#idusers").val();
            var data =  SendDataforapi ('/api/suppress' ,'id='+ id , function(msg){

           ///edit code!
            $('#myModalx').modal('hide');
           ///edit code!
			console.log(msg);
      location.reload();

            });



}
function saveuser()
{

            var id =  $("#idusers").val();
                var name =  $("#nameusers").val();
                    var email =  $("#Emailusers").val();
                        var plan_id =  $("#Statususers").val();

            var data =  SendDataforapi ('/api/save' ,'id='+ id+'&plan_id='+plan_id +'&email='+email + '&name='+name+'&sub='+($("#datetimepicker1").datetimepicker('viewDate').unix() + moment().utcOffset()*60)  , function(msg){

           ///edit code!
            $('#myModalx').modal('hide');

           ///edit code!
			console.log(msg);
            location.reload();
            });



}
function AddIps ()
{

            var id =  $("#idusers").val();

            var data =  SendDataforapi ('/api/SetupUserip' ,'id='+ id  , function(msg){

            if (msg.error){

            	$.alert({
	    title: '@lang("login.An_error")',
	    content: msg.data,


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
            else{
           ///edit code!
            $('#myModalx').modal('hide');

           ///edit code!

            location.reload();}
            });



}
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

@endsection
