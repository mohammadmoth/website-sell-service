<div class = 'card-body' >
    <hr> <div class="h4 red  " data-id="MarketBuyResourser{{$world->id}}"  @if (isset($MarketBuyResourser->run) &&$MarketBuyResourser->run)) style="
    color: green;
" @endif onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.MarketBuyResourser')</div>
    <hr>
