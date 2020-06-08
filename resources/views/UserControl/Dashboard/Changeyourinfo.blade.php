@extends('layouts.controlp')
@section('Changeyourinfo' , 'active')
@section('content')
<br>
<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">@lang("Control.ChangeyourInfo")</h3>
        </div>
        <p></p>
        <div class="card-body">
            <form action='#' class="form-horizontal" id='updateuser'>
                @csrf
                <div class="row">
                    <label class="col-sm-3 form-control-label">@lang("Control.YourInformation")</label>
                    <div class="col-sm-9">
                        <div class="form-group-material">
                            <input id="name" value="{{$user->name}}" type="text" name="name" required
                                class="input-material"> <label for="name"
                                class="label-material">@lang("Control.name")</label>
                        </div>
                        <div class="form-group-material">
                            <input id="lastname" value="{{$user->lastname}}" type="text" name="lastname" required
                                class="input-material"> <label for="lastname"
                                class="label-material">@lang("Control.lastname")</label>
                        </div>

                        <div class="form-group-material">
                            <input id="email" type="email" value="{{$user->email}}" name="email" required
                                class="input-material"> <label for="email" class="label-material">@lang("Control.email")
                            </label>
                        </div>


                    </div>
                    <label class="col-sm-3 form-control-label">@lang("Control.Address")</label>
                    <div class="col-sm-9">

                        <div class="form-group-material">
                            <input id="address" value="{{$user->address}}" type="text" name="address" required
                                class="input-material"> <label for="address"
                                class="label-material">@lang("Control.country") </label>
                        </div>
                        <div class="form-group-material">
                            <input id="city" value="{{$user->city}}" type="text" name="city" required
                                class="input-material"> <label for="city" class="label-material">@lang("Control.city")
                            </label>
                        </div>
                        <div class="form-group-material">
                            <input id="zip" value="{{$user->street}}" type="text" name="zip" required
                                class="input-material"> <label for="zip"
                                class="label-material">@lang("Control.postcode") </label>
                        </div>
                        <div class="form-group-material">
                            <input id="street" value="{{$user->street}}" type="text" name="street" required
                                class="input-material"> <label for="street"
                                class="label-material">@lang("Control.street") </label>
                        </div>
                    </div>
                    <label class="col-sm-3 form-control-label">@lang("Control.yournumbers")</label>
                    <div class="col-sm-9">
                        <div class="form-group-material">
                            <input id="phone" pattern="[+][0-9]{8,}" value="{{$user->phone}}" type="tel" name="phone"
                                required class="input-material"> <label for="phone"
                                class="label-material">@lang("Control.phone")+49xxxxxxxx
                            </label>
                        </div>
                        <div class="form-group-material">
                            <input id="mobile" pattern="[+][0-9]{8,}" value="{{$user->mobile}}" type="text"
                                name="mobile" required class="input-material">
                            <label for="mobile" class="label-material">@lang("Control.mobile") +49xxxxxxxx</label>
                        </div>
                        <div class="form-group-material">
                            <input id="whatsapp" pattern="[+][0-9]{8,}" value="{{$user->whatsapp}}" type="text"
                                name="whatsapp" required class="input-material">
                            <label for="whatsapp" class="label-material">@lang("Control.whatsapp")+49xxxxxxxx </label>
                        </div>
                        <div class="form-group-material">

                            <div class="form-group-material">
                                <button id="savebutton" type="submit" name="registerSubmit"
                                    class="btn btn-primary">Save</button>
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

$("#updateuser").submit(function(e) {
event.preventDefault();
$('#savebutton').prop("disabled",true);
$("#updateuser").ajaxSubmit({url:'/api/edit-info', type: 'post' , success :function(data) {
if ( data.error == 0 )
{


$.alert({
title: '@lang("login.An_S")',
content: '@lang("Control.ok")',


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
$('#savebutton').prop("disabled",false);}, 500);
});


@endsection
