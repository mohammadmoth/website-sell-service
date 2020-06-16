@extends('layouts.controlp')
@section('HomeActive' , 'active')
@section('content')



<br>
<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Info Your Items</h3>




        </div>
        <p></p>

        <div class="card-body">
            @if (count($allProjects)!=0)
            @foreach ($allProjects as $project)
            @if ( $project->isfinsh)
            @continue
            @endif
            <div> <label class="form-control-label" style="font-size: large;"> {{ $project->name }} : </label></div>

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


                @csrf
                <div class="form-group col-md-6 ">
                    <label for="items_id">Select Items</label>

                    <select id='items_id' class="form-control input-material" name="items_id" required>
                    </select>

                </div>
                <div class="form-group col-md-6 ">
                    <div class=" form-row">  <button class="btn btn-danger">Add money</button>

                </div>


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



</script>

@endsection
