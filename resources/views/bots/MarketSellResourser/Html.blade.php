<div style="display: none;" id='MarketSellResourser{{$world->id}}'>
    <div class="form-group col-md-3 ">
        <input type="checkbox" id='MarketSellResourserRun' @if(isset($MarketSellResourser->run) &&$MarketSellResourser->run) checked @endif value='1'
            data-toggle="toggle" data-on="Run" data-off="Off">
    </div>

    <div class="form-group row">

        <h1></h1>

        <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

        <div class="col-sm-9">
            <div class="row">

                <div class="col-sm-9">
                    <div class="row">


                        <div class="col-md-3" style="min-width: 194px;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%<img src="/img/resou.png">
                                    </div>
                                </div>
                                <input type="number"  min="0" id='MinSellByStorgMarketSellResourser{{$world->id}}'
                                value={{ isset($MarketSellResourser->MinSellByStorg) ? $MarketSellResourser->MinSellByStorg :0 }}
                                max="100"
                                    data-toggle="tooltip"
                                     title="@lang('Control.MinSellByStorgMarketSellResourserTitle')"
                                    placeholder="@lang('Control.MinSellByStorg')"
                                     class="form-control">

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
