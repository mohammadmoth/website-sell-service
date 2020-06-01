@extends('layouts.controlp')
@section('LogsBots' , 'active')
@section('content')

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">@lang("Control.LogsBots")</h3>
        </div>
        <p></p>
        <div class="card-body">



        </div>

    </div>
</div>


@endsection
@section('script')
$("#adduser").submit(function(e) {
event.preventDefault();
$('#regidter').prop("disabled",true);
$("#adduser").ajaxSubmit({url:'/api/adduser', type: 'post' , success :function(data) {
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
