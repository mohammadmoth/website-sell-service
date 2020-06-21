@extends('layouts.controlp')

@section('PurchaseItem' , 'active')

@section('content')



<br>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Invoice Item</h3>
        </div>
        <p></p>
        <div class="card-body">
            <div class="tab-content">
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label"></label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">
                                <p>
                                    Itme Name : {{$item->name}}
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">
                                <p>
                                    Itme Decrption : {{$item->Decrption}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">

                                <p>
                                    Itme Cost : {{$item->Cost}}
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">

                                <div class="d-flex flex-row-reverse"> <input type="button"
                                        onclick="PURCHASE({{$item->id}})" value="PURCHASE NOW" id="PURCHASE"
                                        class="btn btn-success"></div>


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
    function PURCHASE(id) {



}

@endsection
