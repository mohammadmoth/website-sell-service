<?php
use Illuminate\Support\Facades\Lang;
use App\RunBots\CookiesBot;
?>

@extends('layouts.controlp') @section('content')

@section('ShowAllUserActive' , 'active'); 
<style> .modal-dialog {
    max-width: 670px;
  
}
</style>

<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">Add New User</h3>
		</div>
		<p></p>
		<div class="card-body">
		{{ $Users->links() }}
			<div class="table-responsive">   
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th  >#</th>
                              <th  >@lang('Control.name')</th>
                              <th  >@lang('Control.Email')</th>
                              <th>@lang('Control.Plan')</th>
                               <th>@lang('Control.UserNameInGame')</th>
                               <th>@lang('Control.Setting')</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i=1?>
                    		@foreach ($Users as $user)
                            <tr>
                              <th scope="row">{{$i++}}</th>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>@lang( 'Control.'.$user->plansname )  </td>
                                <td>{{$user->usernamegame}}  </td>
                                <td><button data-id='{{$user->id}}' data-worlds='<?php
                                $ob = array();
                                foreach ($user->worldall as $wrold) {
                                    $obx = new stdClass();
                                    $obx->id= $wrold->id;
                                    $obx->name =  $wrold->nameworld;
                                    $ob[] = $obx ;
                                    
                                }
                                
                             echo  json_encode($ob) ?>' data-ips='<?php echo  $user->ip?>'  data-name ='{{$user->name}}'  data-email='{{$user->email}}'  data-plan_id='{{$user->plan_id}}'  onclick="ShowData(this)" type="button" class="btn btn-primary"  ><i class="fa fa-gear"></i></button> </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
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
                            <select multiple="" id='ipsall' class="form-control">
                              
                            </select>
                          </div>

  </div>
   

          </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
         <div class="btn-group">
          <button type="button"  id ='buttenlogin' data-id = '' onclick = "loginbyuser()"  class="btn btn-success">@lang('Control.login')</button>
           <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                        <span class="caret"></span>
                      </button>
          <div id='worldbuttonxx' class="dropdown-menu">
          <a class="dropdown-item"   onclick = "loginbybrowser()"  target="_blank">@lang('Control.loginByBrowser')</a>
                     
                         
                      </div>
          </div>
          <button type="button" onclick="Suppress()" id='suppressunsuppress' class="btn btn-warning">@lang('Control.suppress')</button>
          <button type="button" onclick="AddIps()" class="btn btn-danger">@lang('Control.AddIps')</button>
           <button type="submit" onclick="saveuser()"  class="btn btn-success" data-dismiss="modal">@lang('Control.save')</button>
                               <div class="btn-group">
                      <button type="button" class="btn btn-primary">World</button>
                      <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
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


function ShowData(elant)
{
 $("#Emailusers").removeClass("is-invalid");
$('#ipsall').empty();
  var id = $(elant).attr("data-id");
  var name = $(elant).attr("data-name");
    var email = $(elant).attr("data-email");
      var status = $(elant).attr("data-plan_id");
      var worlds = JSON.parse( $(elant).attr("data-worlds"));
      try{
var Ips =  JSON.parse( $(elant).attr("data-ips")); 
} catch (e) {var Ips = null;}
		$("#worldbutton").empty();
		var htmlinput = "";
		worlds.forEach(function(element) {
 htmlinput += '<a class="dropdown-item" href="/dashboard/GetAllData?idworld='+element.id+'"  target="_blank">'+element.name+'</a>' ;
});
$("#worldbutton").append(htmlinput);
     $("#nameusers").val(name);
     $("#Emailusers").val(email);
          $("#Statususers").val(status);
            $("#idusers").val(id);
			$("#buttenlogin").attr("data-id" , id);
		if ( Ips != null ) 	
	Ips.forEach(function(element) {


	$('#ipsall').append('<option >'+element.ip+'</option>');	
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

function loginbyuser ()
{
var i = $("#buttenlogin").attr("data-id");
window.open('/Sendtouser?id='+ i , '_blank');

}

function Suppress() 
{


            var id =  $("#idusers").val();
            var data =  SendDataforapi ('/api/suppress' ,'id='+ id , function(msg){
            
           ///edit code!
            $('#myModalx').modal('hide');
           ///edit code! 
			console.log(msg);
            
            });



}
function saveuser() 
{

            var id =  $("#idusers").val();
                var name =  $("#nameusers").val();
                    var email =  $("#Emailusers").val();
                        var plan_id =  $("#Statususers").val();
                        
            var data =  SendDataforapi ('/api/save' ,'id='+ id+'&plan_id='+plan_id +'&email='+email + '&name='+name  , function(msg){
            
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