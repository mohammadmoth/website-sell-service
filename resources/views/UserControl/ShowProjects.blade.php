@extends('layouts.controlp')



@section('content')


@section('BotsActive' , 'active')
<br>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">@lang('Control.Bots')</h3>
        </div>
        <p></p>
        <div class="card-body">
            <ul class="nav nav-tabs nav-justified">
                @foreach ($worlds as $world)
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab" href="#{{$world->link}}">{{$world->nameworld}}</a>
                </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($worlds as $world)
                <div id="{{$world->link}}" class="tab-pane fade " style='display: nono'>

                    <form action='' method='POST' class="form-horizontal" id='' data-id='{{$world->id}}'>
                        @csrf

                        <input type="hidden" name='id' value='{{$world->id}}'>
                        <!--               Start Theif            -->
                        <div class='card-body'>

                            <input type='hidden' value='0' name='A'>
                            <input type='hidden' value='0' name='B'>
                            <input type='hidden' value='0' name='C'>
                            <div> <input type="checkbox" id="run" data-id="{{$world->id}}" name="run" @if($world->run)
                                checked @endif value='1' data-toggle="toggle" data-on="RunOnPro" data-off="OffOnPro"
                                data-width= '120px'></div>
                            @if ( \App\RunBots\PermationUser::getifnonpro() )
                            <div> <input type="checkbox" id="runnopro" data-id="{{$world->id}}" name="runnopro"
                                    @if($world->runnopro) checked @endif value='1' data-toggle="toggle"
                                data-on="RunNoNPro" data-off="OffNoNPro" data-width= '120px' data-onstyle="danger" >
                            </div>
                            @endif
                            <div class='d-flex flex-row-reverse'> <input type="button"
                                    onclick='submitForm(this,{{$world->id}})' id='SendData' value='save' class='btn'>
                            </div>
                            <hr>
                            <div class="h4 red" data-id="0form" @if(isset($Loot_Assistant->run))
                                @if($Loot_Assistant->run) style="
                                color: green;
                                " @endif
                                @endif
                                onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.Bottheftassistant')</div>
                            <hr>
                            @if ( \App\RunBots\PermationUser::checkup("Thif") )
                            <div class="form-group row" style="display: none;" id='0form'>
                                <h1></h1>


                                <label class="col-sm-3 form-control-label">@lang('Control.InputPramter')</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="form-group col-md-3 ">
                                            <input type="checkbox" @if(isset($Loot_Assistant->run))
                                            @if($Loot_Assistant->run) checked @endif @endif name='BottheftassistantRun'
                                            id='BottheftassistantRun' value='1' data-toggle="toggle" data-on="Run"
                                            data-off="Off">
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon"><img
                                                            src="/img/unit_light.png" alt=""></div>
                                                </div>
                                                <input type="number" min="0" value="{{$Loot_Assistant->array_light}}"
                                                    id='array_light' name='light' max="99999" data-toggle="tooltip"
                                                    title="@lang('Control.lightTitle')"
                                                    placeholder="@lang('Control.lights')" class="form-control">

                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon"><i
                                                            class="fa fa-clock-o" style="font-size:23px"></i>
                                                    </div>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input id="TiemMax" name='TiemMaxForListSteel'
                                                            value="{{$Loot_Assistant->TiemMax}}" type="text"
                                                            class="form-control input-small formales5565"
                                                            data-toggle="tooltip" title="@lang('Control.TimeMaxtitle')"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon"><img
                                                            src="/img/resou.png">
                                                    </div>
                                                </div>
                                                <input type="number" min="0" value="{{$Loot_Assistant->ResressMinC}}"
                                                    id='ResressMinC' name='ResourcesMinForC' max="99999"
                                                    data-toggle="tooltip" title="@lang('Control.ResressMinCtitle')"
                                                    placeholder="@lang('Control.resources')" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon"><img
                                                            src="/img/resou.png">
                                                    </div>
                                                </div>
                                                <input type="number" min="0" value="{{$Loot_Assistant->ResressMAXC}}"
                                                    id='ResressMAXC' name='ResourcesMaxForC' max="99999"
                                                    data-toggle="tooltip" title="@lang('Control.ResressMAXCtitle')"
                                                    placeholder="@lang('Control.resources')" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon"><img
                                                            src="/img/wall.png">
                                                    </div>
                                                </div>
                                                <input type="number" min="0" value="{{$Loot_Assistant->WallMAX}}"
                                                    id='WallMAX' name='WallMax' max="99999" data-toggle="tooltip"
                                                    title="@lang('Control.WallMAXtitle')"
                                                    placeholder="@lang('Control.wall')" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon"><img
                                                            src="/img/rechts.png" height="16" width="16">
                                                    </div>
                                                </div>
                                                <input type="number" min="0" value="{{$Loot_Assistant->stepMAX}}"
                                                    id='stepMAX' name='stepMax' max="99999" data-placement="bottom"
                                                    data-toggle="tooltip" title="@lang('Control.stepMAXtitle')"
                                                    placeholder="@lang('Control.stepMAX')" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text" id="btnGroupAddon"><i
                                                            class="fa fa-clock-o" style="font-size:23px"></i>
                                                    </div>
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input value="{{$Loot_Assistant->TiemMin}}" id='TiemMin'
                                                            name='TiemMinForListSteel' type="text"
                                                            class="form-control input-small formales5565"
                                                            data-toggle="tooltip" title="@lang('Control.TimeMintitle')"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">

                                                </div>
                                                <div title="@lang('Control.Atitle')" data-placement="bottom"
                                                    data-toggle="tooltip">
                                                    <input type="checkbox" name="A" @if($Loot_Assistant->A) checked
                                                    @endif value='1' data-toggle="toggle " data-on="A" data-off="Off">
                                                </div>
                                                <div title="@lang('Control.Btitle')" data-placement="bottom"
                                                    data-toggle="tooltip"> <input type="checkbox" name="B"
                                                        @if($Loot_Assistant->B) checked @endif value='1'
                                                    title="@lang('Control.Btitle')" data-toggle="toggle" data-on="B"
                                                    data-off="Off">
                                                </div>
                                                <div title="@lang('Control.Ctitle')" data-placement="bottom"
                                                    data-toggle="tooltip">
                                                    <input type="checkbox" value='1' title="@lang('Control.Ctitle')"
                                                        data-toggle="toggle" @if($Loot_Assistant->C) checked @endif
                                                    name="C" data-on="C" data-off="Off"> </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>



                            @endif
                        </div>

                        <!--     End Assest Thief Helper -->

                        <!-- Start Send Res to sonp  -->

                    </form>
                </div>




            </div>
        </div>
    </div>
</div>
<!-- End Show Deglio FakeAttakEdit -->

@endsection
@section('script')

@endsection
