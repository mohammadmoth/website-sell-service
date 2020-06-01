<div class = 'card-body' >
    <hr> <div class="h4 red  " data-id="MarketSellResourser{{$world->id}}"  @if (isset($MarketSellResourser->run) &&$MarketSellResourser->run)) style="
    color: green;
" @endif onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.MarketSellResourser')</div>
    <hr>
