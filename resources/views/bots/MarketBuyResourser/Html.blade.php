<div style="display: none;" id='MarketBuyResourser{{$world->id}}'>
    <div class="form-group col-md-3 ">
        <input type="checkbox" id='MarketBuyResourserRun' @if(isset($MarketBuyResourser->run) &&$MarketBuyResourser->run) checked @endif value='1'
            data-toggle="toggle" data-on="Run" data-off="Off">
    </div>

    <div class="form-group row">

        <h1></h1>

        <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

        <div class="col-sm-9">
            <div class="form-group col-md-9 col-sm-9">
                <select id='idviligeMarketBuyResourser{{$world->id}}' class="form-control">
                    @if($Viligname!= null)
                        @foreach($Viligname as $name )
                            @if(isset($name->name))



                                    @if (isset($MarketBuyResourser->Vilignameid) && (int)$name->id == (int)$MarketBuyResourser->Vilignameid)
                                        <option selected value='{{ $name->id }}'>{{ $name->name }}</option>


                                    @else

                                    <option  value='{{ $name->id }}'>{{ $name->name }}</option>
                                    @endif

                            @endif

                        @endforeach
                    @endif
                </select>
            </div>
            <div class="row">

                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-3" style="min-width: 194px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" ><img src="/img/wood.png">
                                    </div>
                                </div>
                                <input onchange="listMarketBuyResourser[{{$world->id}}].change=true" type="number" min="0" id='MAXBuy_woodMarketBuyResourser{{$world->id}}' value={{ isset($MarketBuyResourser->MAXBuy_wood) ? $MarketBuyResourser->MAXBuy_wood :0 }} max="99999"
                                    data-toggle="tooltip" title="@lang('Control.MAXBuy_woodMarketBuyResourserTitle')"
                                    placeholder="@lang('Control.MAXBuy_wood')" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-3" style="min-width: 194px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img src="/img/stone.png">
                                    </div>
                                </div>
                                <input type="number" onchange="listMarketBuyResourser[{{$world->id}}].change=true" min="0" id='MAXBuy_stoneMarketBuyResourser{{$world->id}}' value={{ isset($MarketBuyResourser->MAXBuy_stone) ? $MarketBuyResourser->MAXBuy_stone :0 }} max="99999"
                                    data-toggle="tooltip" title="@lang('Control.MAXBuy_stoneMarketBuyResourserTitle')"
                                    placeholder="@lang('Control.MAXBuy_stone')" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-3" style="min-width: 194px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" ><img src="/img/iron.png">
                                    </div>
                                </div>
                                <input type="number" onchange="listMarketBuyResourser[{{$world->id}}].change=true" min="0" id='MAXBuy_ironMarketBuyResourser{{$world->id}}' value={{ isset($MarketBuyResourser->MAXBuy_iron) ? $MarketBuyResourser->MAXBuy_iron :0 }} max="99999"
                                    data-toggle="tooltip" title="@lang('Control.MAXBuy_ironMarketBuyResourserTitle')"
                                    placeholder="@lang('Control.MAXBuy_iron')" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-3" style="min-width: 194px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><img src="/img/resou.png">
                                    </div>
                                </div>
                                <input type="number" onchange="listMarketBuyResourser[{{$world->id}}].change=true" min="0" id='MAXBuyOneMarketBuyResourser{{$world->id}}' value={{ isset($MarketBuyResourser->MAXBuyOne) ? $MarketBuyResourser->MAXBuyOne :0 }} max="99999"
                                    data-toggle="tooltip" title="@lang('Control.MAXBuyOneMarketBuyResourserTitle')"
                                    placeholder="@lang('Control.MAXBuyOne')" class="form-control">

                            </div>
                        </div>
                        <div class="col-md-3" style="min-width: 194px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" >
                                        <img src="/img/resou.png">

                                        ⇄
                                    <img src="/img/premium.png">
                                    </div>
                                </div>
                                <input type="number" onchange="listMarketBuyResourser[{{$world->id}}].change=true" min="0" id='MinPPEXMarketBuyResourser{{$world->id}}' value={{ isset($MarketBuyResourser->MinPPEX) ? $MarketBuyResourser->MinPPEX :100 }} max="99999"
                                    data-toggle="tooltip" title="@lang('Control.MinPPEXMarketBuyResourserTitle')"
                                    placeholder="@lang('Control.MinPPEX')" class="form-control">

                            </div>
                        </div>


                        <div class="col-md-3" style="min-width:250px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" ><span id="MarketBuyResourserTimeHave{{$world->id}}">  </span> <i class="fa fa-clock-o"
                                            style="font-size:23px"></i>
                                    </div>
                                    <div class="input-group bootstrap-timepicker timepicker">
                                        <input id="TimeMarketBuyResourserTitle{{$world->id}}"
                                            name='TimeMarketBuyResourserTitle{{$world->id}}' value="{{ isset($MarketBuyResourser->TimerEnd) ? $MarketBuyResourser->TimerEndTEXT :"01:00:00" }}" type="text"
                                            class="form-control input-small MarketBuyResourserTimeHave{{$world->id}}" data-toggle="tooltip"
                                            title="@lang('Control.TimeMarketBuyResourserTitle')" class="form-control">
                                            <input type="button" onclick="listMarketBuyResourser[{{$world->id}}].fresh = true" value="@lang('Control.RefreshTime')" class="form-control  btn-primary btn ">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <!-- Tab -->

            <!--  Tab -->
        </div>
    </div>

{{--Remove Table
    <!-- Tablstart -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">@lang("Control.Vilige")</th>
                    <th scope="col">@lang("Control.Events")</th>
                </tr>
            </thead><br>
            <tbody id="DateAllThifHelper{{ $world->id }}">
                <!-- data -->



            </tbody>
        </table>
    </div>
--}}
</div>
