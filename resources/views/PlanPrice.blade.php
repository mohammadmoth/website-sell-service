@foreach($Arrayplans as $plans)
<div class="pricing-table">
    @foreach($plans as $plan)

    <div class="pricing-option">
        <i class="material-icons">{{ $plan->image}}</i>
        <h1 style="font-size: 20px;">
            {{ $plan->name}}</h1>
        <hr />
        <p> {!! $plan->deceptions !!}</p>
        <hr />
        <div class="price">
            <div class="front">
                <span class="price">{{$plan->cost}} <b>$</b></span>
            </div>
            <div class="back">
                @guest
                <a href="{{route("signupuser")}}" class="button">Purchase now</a>
                @endguest
                @auth
                <a href="{{route("home")}}" class="button">Login</a>
                @endguest
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach
