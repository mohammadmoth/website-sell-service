
@if ( isset($jsonbotssettings->MarketSellResourser) && $jsonbotssettings->MarketSellResourser !=null )
try {
    listMarketSellResourser[{{$world->id}}] = JSON.parse( '<?php echo json_encode($jsonbotssettings->MarketSellResourser)?>');
}
catch(error) {
 console.log(error);
}
@if (!isset($jsonbotssettings->MarketSellResourser->TimerEnd))
<?php $jsonbotssettings->MarketSellResourser->TimerEnd = time(); ?>
@endif

if ( {{$jsonbotssettings->MarketSellResourser->TimerEnd}} - moment().unix() < 0 )
{
$('#MarketSellResourserTimeHave{{$world->id}}').html(`@lang('Control.TimeOutMarketSellResourser')`)
}
else{
var duration{{$world->id}} = 0;


      setInterval(function(){
      duration{{$world->id}} = moment.duration({{$jsonbotssettings->MarketSellResourser->TimerEnd}} *1000- moment().unix()*1000, 'milliseconds');
      if (  duration{{$world->id}} > 0)
      $('#MarketSellResourserTimeHave{{$world->id}}').html( `
      ${(duration{{$world->id}}.hours())}:${(duration{{$world->id}}.minutes())}:${(duration{{$world->id}}.seconds())}`);
      else
      $('#MarketSellResourserTimeHave{{$world->id}}').html(`@lang('Control.TimeOutMarketSellResourser')`);

      }, 1000);
}


@endif
$(document).ready(function() {

$('.MarketSellResourserTimeHave{{$world->id}}').timepicker({minuteStep: 1,
    template: 'modal',
    appendWidgetTo: 'body',
    showSeconds: true,
    showMeridian: false,
    defaultTime: false,
    maxHours:7
})});
