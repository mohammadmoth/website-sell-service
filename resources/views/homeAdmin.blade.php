@extends('layouts.controlp')
@section('HomeActive' , 'active')
@section('content')



<br>
<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Info Your Admin</h3>




        </div>
        <p></p>

        <div class="card-body">
            <div> <label class="form-control-label" style="
                font-size: large;"> You Have Money On System : {{$out->TotalMoney }} </label></div>
            <div> <label class="form-control-label" style="
            font-size: large;"> You Have Money withdrawal On System : {{ $out->Withdrawal  }} </label></div>
            <div> <label class="form-control-label" style="
                            font-size: large;"> You Have Users : {{ $out->UsersCount   }}
                </label></div>
            <div> <label class="form-control-label" style="
                    font-size: large;"> You Have Freelancer : {{ $out->FreelancerCount   }}
                </label></div>
            <div> <label class="form-control-label" style="
                    font-size: large;"> You Have Money Panding On System : {{ $out->TotalMoney - $out->TotalSpend    }}
                </label></div>
            <div> <label class="form-control-label" style="
                    font-size: large;"> You Have Project Active : {{ $out->ProjectAtiveCount   }}
                </label></div>
            <div> <label class="form-control-label" style="
                    font-size: large;"> You Have Project Pending : {{ $out->ProjectPending  }}
                </label></div>


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
