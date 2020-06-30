@extends('layouts.controlp')
@section('HomeActive' , 'active')
@section('content')



<br>
<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Info Your Items Admin</h3>




        </div>
        <p></p>

        <div class="card-body">
            <div> <label class="form-control-label" style="
                font-size: large;"> You Have Money On You Account : {{ Auth::user()->money }} </label></div>
            @if (count($allProjects)!=0)
            <div> <label class="form-control-label" style="font-size: large;">My Projects :</label></div>
            @foreach ($allProjects as $project)
            @if ( $project->isfinsh)
            @continue
            @endif
            <div> <label class="form-control-label" style="font-size: large;"><a
                        href="{{route("showallprojects")}}">{{ $project->name }} </a></label></div>

            @endforeach
            @else
            <div> <label class="form-control-label" style="
                font-size: large;"> You do't have any project active in your account </label></div>

            @endif



        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Purchase Items</h3>
        </div>
        <p></p>

        <div class="card-body">

            <form action="{{route("PurchaseItem")}}" method="get">

                <div class="form-group col-md-6 ">



                    <div class="form-group"> <label for="items_id">Select Items </label>
                        <div class="input-group">

                            <select id='items_id' class="form-control input-material" name="items_id" required>
                                @foreach ($items as $item )
                                <option value="{{ $item->id }}"> {{ $item->name}}</option>
                                @endforeach

                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" onclick="openitem()">Select</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <div class="form-group col-md-6 ">



                <a href="/#PricingPlan"> Read More about Items . click here</a>
            </div>




            <div class=" form-row">



                <!-- Used to display Element errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button class="btn btn-danger">Add money</button>

        </div>

    </div>
</div>

@endsection


@section('script')
</script>


<script>
    function openitem(params) {

}


</script>

@endsection
