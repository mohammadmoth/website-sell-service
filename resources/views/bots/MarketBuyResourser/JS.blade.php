
@if ( isset($jsonbotssettings->MarketBuyResourser) && $jsonbotssettings->MarketBuyResourser !=null )
try {
    listMarketBuyResourser[{{$world->id}}] = JSON.parse( '<?php echo json_encode($jsonbotssettings->MarketBuyResourser)?>');
}
catch(error) {
 console.log(error);
}
@if (!isset($jsonbotssettings->MarketBuyResourser->TimerEnd))
<?php $jsonbotssettings->MarketBuyResourser->TimerEnd = time(); ?>
@endif

if ( {{$jsonbotssettings->MarketBuyResourser->TimerEnd}} - moment().unix() < 0 )
{
$('#MarketBuyResourserTimeHave{{$world->id}}').html(`@lang('Control.TimeOutMarketBuyResourser')`)
}
else{
var duration{{$world->id}} = 0;


      setInterval(function(){
      duration{{$world->id}} = moment.duration({{$jsonbotssettings->MarketBuyResourser->TimerEnd}} *1000- moment().unix()*1000, 'milliseconds');
      if (  duration{{$world->id}} > 0)
      $('#MarketBuyResourserTimeHave{{$world->id}}').html( `
      ${(duration{{$world->id}}.hours())}:${(duration{{$world->id}}.minutes())}:${(duration{{$world->id}}.seconds())}`);
      else
      $('#MarketBuyResourserTimeHave{{$world->id}}').html(`@lang('Control.TimeOutMarketBuyResourser')`);

      }, 1000);
}


@endif
$(document).ready(function() {

$('.MarketBuyResourserTimeHave{{$world->id}}').timepicker({minuteStep: 1,
    template: 'modal',
    appendWidgetTo: 'body',
    showSeconds: true,
    showMeridian: false,
    defaultTime: false,
    maxHours:7
})});
