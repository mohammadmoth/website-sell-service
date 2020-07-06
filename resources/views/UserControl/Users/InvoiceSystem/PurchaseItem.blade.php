@extends('layouts.controlp')

@section('PurchaseItem' , 'active')

@section('content')



<br>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Purchase Item</h3>
        </div>
        <p></p>
        <div class="card-body">
            <div class="tab-content">
                <div class="form-group row">

                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">
                                <p>
                                    Name : {{$item->name}}
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">
                                <p>
                                    Decrption : {{$item->deceptionsLong}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">

                                <p>
                                    Cost : {{$item->cost}}
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">

                                <div class="d-flex flex-row-reverse"> <input type="button"
                                        onclick="PURCHASE({{$item->id}},'{{$item->name}}')" value="PURCHASE NOW"
                                        id="PURCHASE" class="btn btn-success"></div>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection


@section('script')

</script>
<script src="https://secure.avangate.com/checkout/client/twoCoInlineCart.js" async> </script>



<script>
    function PURCHASE (id , name)
{

    var bntname = $('#PURCHASE');
        bntname.prop("disabled",true);
    $.confirm({
        title: 'Purchase item:'+name,
        content: 'Do you Purchase this project?, are you sure?',
        buttons: {
            confirm: { btnClass: 'btn-blue', action: function () {
                                var data =  SendDataforapi ('{{route("purchaseapi")}}','id='+id , function(msg)
                                {

/*




*/
                                    var mess = "";
                                  //      console.log(dataall);


                                    if ( msg.error== 1){
                                        dataall = msg.data;
                                                dataall.forEach(function(element) {
                                                    mess += element+'<hr><br>';});
                                            $.alert({
                                        title: 'An error!',
                                        content:mess,


                                        typeAnimated: true,
                                        buttons: {
                                        tryAgain: {
                                            rtl: true,
                                            text: 'Ok',
                                            btnClass: 'btn',
                                            action: function(){
                                                bntname.prop("disabled",false);

                                            }
                                        }

                                        }
                                        });

                                    }
                                    else if ( msg.error>= 2){
                                        var setOrderExternalRef =msg.ref;


                                        $.confirm({
                                        title: 'You do\' have money on your account',
                                        content: 'You must pay now to get this item , are you sure ?',
                                        buttons: {
                                            confirm:
                                             function(){

                                                    (function (document, src, libName, config) {
                                                 /*       var script             = document.createElement('script');
                                                        script.src             = src;
                                                        script.async           = true;
                                                        var firstScriptElement = document.getElementsByTagName('script')[0];*/

                                                            for (var namespace in config) {
                                                                if (config.hasOwnProperty(namespace)) {
                                                                    window[libName].setup.setConfig(namespace, config[namespace]);
                                                                }
                                                            }

                                                            window[libName].register();
                                                            window[libName].cart.setOrderExternalRef(msg.data.ref);
                                                            TwoCoInlineCart.products.add({ code: msg.data.id2checkout,quantity:1});

                                                           /* TwoCoInlineCart.products.addMany([{
                                                                                    type: 'PRODUCT',
                                                                                    name: 'product 1',
                                                                                    price: 10,
                                                                                    tangible: true,
                                                                                    quantity: 1,
                                                                                    },
                                                                                    {
                                                                                        type: 'PRODUCT',
                                                                                        name: 'product 2',
                                                                                        price: 30,
                                                                                        tangible: true,
                                                                                        quantity: 1,
                                                                                    } ] );*/
                                                            TwoCoInlineCart.cart.checkout();
                                                            TwoCoInlineCart.events.subscribe('payment:finalized', function () {
                                                                $.alert({
                                                                title: 'Thanks',
                                                                content:'Thank You For Pay , We Will Send Emails informaion',
                                                            typeAnimated: true,
                                                            buttons: {
                                                            tryAgain: {
                                                                rtl: true,
                                                                text: 'Ok',
                                                                btnClass: 'btn',
                                                                action: function(){
                                                                   // bntname.prop("disabled",false);
                                                                    window.location.href = '{{route("Invoices")}}'
                                                                }
                                                            }
                                                         }
                                                              });
                                                            });



                                                       // firstScriptElement.parentNode.insertBefore(script, firstScriptElement);
                                                    })(document, 'https://secure.avangate.com/checkout/client/twoCoInlineCart.js',
                                                    'TwoCoInlineCart',{"app":{"merchant":"250272971171","iframeLoad":"checkout"}
                                                    ,"cart":{"host":"https:\/\/secure.2checkout.com","customization":"inline"}});
                                                    bntname.prop("disabled",false);

                                            } , cancel: function () {
                                                bntname.prop("disabled",false);
                                                        }
                                            }
                                    });
                                    }
                                    else{

                                                    $.alert({
                                                title: 'Item Purchased ',
                                                content:'Item Purchased .',


                                                typeAnimated: true,
                                                buttons: {
                                                tryAgain: {
                                                    rtl: true,
                                                    text: 'Ok',
                                                    btnClass: 'btn',
                                                    action: function(){
                                                        bntname.prop("disabled",false);
                                                        window.location.href = '{{route("showallprojects")}}'
                                                    }
                                                }

                                                }
                                                });
                                        }
                                }
                                , function (error){



                                    var errors = "";
                                    if ( "data" in error.responseJSON)
                                        {
                                            for (let index = 0; index < error.responseJSON.data.length; index++) {
                                                errors += error.responseJSON.data[index] +"<br>";

                                            }

                                        }
                                        else
                                        errors = "error unknow !"
                                    $.alert({
                                                title: 'An Error ',
                                            content: errors,
                                                }
                                );
                                bntname.prop("disabled",false);
                                }
                                );

                                            },
                                            cancel: function () {
                                                bntname.prop("disabled",false);
                                            }
                }, cancel: function () {
                    bntname.prop("disabled",false);
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
//TODO تحقق من رصيد
//TODO في حال عدم وجود رصيد يقوم بدفع
//TODO في حال وجود رصيد يقوم بقبول الطلب

@endsection
