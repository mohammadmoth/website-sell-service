@extends('layouts.controlp')
@section('ShowStatus' , 'active')
@section('content')

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Control Server</h3>
        </div>
        <p></p>
        <div class="card-body">


            <div class="row">
                <label class="col-sm-3 form-control-label">System Info </label>
                <div class="col-sm-9">
                    <?php
Artisan::call('ChekServer', [
    'number' => 1 ,
]);
$data =  Cache::get('ChekServer' , false);

?>
                    @if ( $data !== false)
                    @foreach ( $data as $statusSystem )

                    @if ( $statusSystem->status)
                    <div class="alert alert-success" role="alert">
                        @else
                        <div class="alert alert-danger" role="alert">
                            @endif

                            <h4 class="list-group-item-heading">
                                {{$statusSystem->name}}
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="{{$statusSystem->title}}">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                            </h4>
                            @if ( $statusSystem->status)
                            {{ $statusSystem->dec_run}}
                            @else
                            {{ $statusSystem->dec_error}}
                            @endif

                        </div>
                        @endforeach

                        @else

                        <div class="alert alert-danger" role="alert">

                            <h4 class="list-group-item-heading">
                                Error
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="Please Tell Admin dev for this">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                            </h4>
                            Error On System
                        </div>

                        @endif



                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">

            <div class="card-header d-flex align-items-center">
                <h3 class="h4 whitefont  ">Commands System</h3>
            </div>
            <p></p>
            <div class="card-body">


                <div class="row">
                    <label class="col-sm-3 form-control-label">System Info </label>
                    <div class="col-sm-9">
                        <?php

$data =  Cache::get('AllCommandSystems' , false);

?>
                        @if ( $data !== false)
                        @foreach ( $data as $statusSystem )

                        <div class="alert alert-primary" role="alert">


                            <h4 class="list-group-item-heading">

                                <input type="button" onclick="Api(this, {{$statusSystem->pageAPI}})" id="Api"
                                    value=" {{$statusSystem->name}}" class="btn">

                                </a>
                            </h4>

                            {{ $statusSystem->title}}


                        </div>
                        @endforeach

                        @else

                        <div class="alert alert-danger" role="alert">

                            <h4 class="list-group-item-heading">
                                Error
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                    title="Please Tell Admin dev for this">
                                    <i class="fa fa-question-circle"></i>
                                </a>
                            </h4>
                            Error On System
                        </div>

                        @endif



                    </div>
                </div>
            </div>

        </div>
    </div>



    @endsection
    @section('script')


    @endsection
