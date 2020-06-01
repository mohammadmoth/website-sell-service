@extends('layouts.controlp') @section('content') 
@section('HomeActive' ,'')
@section('AddAdminUserActive' , '')
@section('SendMess' ,'active'); 
@section('EditAdminUseActive' , '')


<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">Add New User</h3>
		</div>
		<p></p>
		<div class="card-body">
			<form action='#' class="form-horizontal" id='NewMessges'>
				@csrf <label class="col-sm-3 form-control-label">@lang('Control.SendMessgAdmin')</label>
				<div class="col-sm-9">

					<div class="form-group-material">

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">@</span>
								</div>
								
								<input type="text" placeholder="@lang('Control.name')" id='name' name='idusersend'
								required  autocomplete="on"	class="form-control">
							</div>
						</div>
				
					<div class="form-group">
					
                            <select name="notfiction" class="form-control">
                              <option value = '0'>@lang('Control.MessgBox')</option>
                              <option value = '1'>@lang('Control.Notfcations')</option>
                            </select>
                         
					</div>

						<div class="form-group-material">
							<input id="titel" type="text" name="titel" required
								class="input-material"> <label for="titel"
								class="label-material">@lang('Control.titel')</label>
						</div>


						<div class="form-group-material">
						  <textarea class="form-control" placeholder="@lang('Control.MessegBox')"  rows="5" id="messg"  name="messg" form="NewMessges" ></textarea>
						
						</div>
						
						<div class="form-group-material">
							<div class="form-group-material">
								<button id="Send" type="submit" name="Send"
									class="btn btn-primary">@lang('Control.Send')</button>
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
/*
$(function () {
    var availableTags ;
    var cache = {};
    $('#name').autocomplete({
        source: function (request, response) {
            var term = request.term;
            console.log(cache);
            if (term in cache) {
                response(cache[term]);
                return;
            }

            $.getJSON("/api/getname", request, function (data, status, xhr) {
              availableTags= data;
                cache[term] = availableTags;
                response(availableTags);
            });
        },
        minLength: 0
    }).focus(function () {
    console.log("fuck");
        var $this = $(this);
        var inputVal = $this.val();
        if (inputVal !== '') {
            $this.autocomplete("search");
        }
    });
});
*/

$.getJSON("/api/getname", 'term=', function (data, status, xhr) {
   

        
$('#name').tokenfield({
  autocomplete: {
    source: data ,
    delay: 100
  },
  showAutocompleteOnFocus: true
})
    });



$("#NewMessges").submit(function(e) {
event.preventDefault();
    $('#Send').prop("disabled",true);
$("#NewMessges").ajaxSubmit({url:'/api/SendMess', 
data: 'data=1',
type: 'post' ,  success :function(data) { 
			if ( data.error == 0 )
			{
		/*	$('#email').val("");
			$('#name').val(""); 	
			$('#password').val("");
			*/
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
      $('#Send').prop("disabled",false);}, 500);
});
@endsection
