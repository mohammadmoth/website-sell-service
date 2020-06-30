@extends('layouts.controlp')
@section('HomeActive' , 'active')
@section('content')



<br>
<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Info Your Items FreeLancer</h3>




        </div>
        <p></p>

        <div class="card-body">
            <div> <label class="form-control-label" style="
                font-size: large;"> You Have Money On You Account : {{ Auth::user()->money }} </label></div>
            @if (count($allProjects)!=0)
            <div> <label class="form-control-label" style="font-size: large;">My Projects </label></div>
            @foreach ($allProjects as $project)
            @if ( $project->isfinsh)
            @continue
            @endif
            <div> <label class="form-control-label" style="font-size: large;"><a
                       onclick="login({{$project->users_id}} ,{{$project->id}} )" href="#">{{ $project->name }} </a></label></div>

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
            <h3 class="h4 whitefont  ">Get Your Money</h3>
        </div>
        <p></p>

        <div class="card-body">
            @if (Auth::user()->phone == null)
            <div> <label class="form-control-label" style="font-size: large;"><a href="{{route("edit-info")}}">Complete
                        your information </a></label></div>



            @else

            <div class=" form-row">



                <!-- Used to display Element errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button class="btn btn-danger">Add money</button>


            @endif
        </div>
    </div>
</div>

@endsection


@section('script')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>

<script>
    function login(iduser,project) {


        var data = {"id":iduser , "project":project};
		axios.
        post("{{route("APIFreelancerLogin")}}",data)
        .then
        (response => {

            window.open(response.data.data,'_blank');

            }).catch((error) => {
                var errors = "";
                if ( "data" in error.response.data)
                    {
                        for (let index = 0; index < error.response.data.data.length; index++) {
                             errors += error.response.data.data[index] +"<br>";

                        }

                    }
                    else
                    errors = "error unknow !"
                $.alert({
                            title: 'An Error ',
                        content: errors,
                            }
            ) });

}


</script>

@endsection
