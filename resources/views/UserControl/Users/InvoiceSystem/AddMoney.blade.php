@extends('layouts.controlp')

@section('AddMoney' , 'active')

@section('content')



<br>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Add Money</h3>
        </div>
        <p></p>
        <div class="card-body">
            <div class="tab-content">
                <div class="form-group row">

                    <div class="col-sm-9">
                        <div class="form-group">
                          <div class="input-group">Add money value : {{$money}}
                               <!--   <input type="number" min="10" max="10000" onchange="Value(this)" class=" form-control" //TODO اضافة هنا اختيار الدفع
                                    value="{{$money}}" id="AddMoney">--></div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="form-group">
                        <div class="input-group">

                            <div class="d-flex flex-row-reverse">
                                <button type="button" href="#buy" class="avangate_button btn btn-success"  product-code="AD6A13E476" product-quantity="1">Buy Now!</a>
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



<script>
    function Value (text)
    {
        if (!(  Number.isInteger(Number.parseInt($(text).val())) && $(text).prop("min") >=  Number.isInteger(Number.parseInt($(text).val())) && Number.isInteger(Number.parseInt($(text).val())) <= Number.isInteger(Number.parseInt($(text).val())) ))

            $(text).val($(text).prop("min") );



    }
function AddNow (id , name)
{

        var bntname = $('#AddNow');
      //  bntname.prop("disabled",true);



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


@endsection
