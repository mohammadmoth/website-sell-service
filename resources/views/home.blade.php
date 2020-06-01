@extends('layouts.controlp')
@section('HomeActive' , 'active')
@section('content')



<br>
<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">@lang('Control.subscribe_info')</h3>




        </div>
        <p></p>

        <div class="card-body">
            <div> <label class="form-control-label" style="
                        font-size: large;
                    ">@lang('Control.your_subscrib_end_on'): </label></div>
            <div>
                <label class="form-control-label" style="
                                          font-size: large;
                                      ">@lang('Control.YouHave'): <span id="date"></span></label>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">@lang('Control.addsubscribe')</h3>




        </div>
        <p></p>

        <div class="card-body">

            <form action="/rect" method="post" id="payment-form">
                @csrf
                <div class="form-group col-md-6 ">
                    <label for="Status">@lang('Control.plan')</label>

                    <select id='plan_id' class="form-control input-material" name="plan_id" required>


                    </select>
                    <a href="/#PricingPlan"> @lang('Control.ReadMore')</a>
                </div>

                <div id="card-element">
                    <label for="card-element">
                        @lang('Control._Credit_or_debit_card_googlepay_apply_pay')
                        <div> <br>@lang('Control.ifuneednewplantelladmin')</div>
                    </label>
                    <!-- A Stripe Element will be inserted here. -->
                </div>
                <div id="card-element">
                    <label for="card-element">

                        <a
                            href="https://wa.me/0037379752939?text={{urlencode(__('Control.ifuneednewplantelladminmessegs'))}}">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/766px-WhatsApp.svg.png"
                                style="
                           @if(app()->getLocale() !=" ar") left: 20px; @else right: 12px; @endif position:
                                relative; " alt=" Smiley face" height="70" width="70"></i>
                            <div style="
                            @if(app()->getLocale() !=" ar") left: 20px; @else right: 20px; @endif position: relative; ">@lang('Welcome.CallMe')</div> <div><p>+37379752939</p></div></a>
                      </label> </div>
                    <div class=" form-row">



                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button class="btn btn-danger">@lang("Control.Payment")</button>
            </form>
        </div>

    </div>
</div>

@endsection


@section('script')
</script>


<script>



</script>

@endsection
