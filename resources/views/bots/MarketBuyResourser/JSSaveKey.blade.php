
var MarketBuyResourser = {};
if ( typeof listMarketBuyResourser[id] != "undefined" )
{
if (listMarketBuyResourser[id].hasOwnProperty("fresh"))
 MarketBuyResourser.fresh =listMarketBuyResourser[id].fresh;

 if (listMarketBuyResourser[id].hasOwnProperty("change"))
 MarketBuyResourser.change =listMarketBuyResourser[id].change;

 if (listMarketBuyResourser[id].hasOwnProperty("TimerEnd"))
 MarketBuyResourser.TimerEnd =listMarketBuyResourser[id].TimerEnd;

 if (listMarketBuyResourser[id].hasOwnProperty("TimerEndTEXT"))
 MarketBuyResourser.TimerEndTEXT =listMarketBuyResourser[id].TimerEndTEXT;
}

MarketBuyResourser.run = $('#datasend'+id+' input[id="MarketBuyResourserRun"]')[0].checked;


listMarketBuyResourser[id] = MarketBuyResourser;

listMarketBuyResourser[id].Vilignameid = $("#idviligeMarketBuyResourser"+id).val();
listMarketBuyResourser[id].MAXBuy_wood = $("#MAXBuy_woodMarketBuyResourser"+id).val();
listMarketBuyResourser[id].MAXBuy_stone =  $("#MAXBuy_stoneMarketBuyResourser"+id).val();
listMarketBuyResourser[id].MAXBuy_iron = $("#MAXBuy_ironMarketBuyResourser"+id).val();

listMarketBuyResourser[id].MAXBuyOne = $("#MAXBuyOneMarketBuyResourser"+id).val();

listMarketBuyResourser[id].MinPPEX= $("#MinPPEXMarketBuyResourser"+id).val();

    if (listMarketBuyResourser[id].hasOwnProperty("TimerEnd"))
    if (listMarketBuyResourser[id].TimerEnd - moment().unix() <= 0   && MarketBuyResourser.run )
    listMarketBuyResourser[id].fresh =true;

if ( listMarketBuyResourser[id].hasOwnProperty("fresh")  && listMarketBuyResourser[id].fresh == true && MarketBuyResourser.run){
listMarketBuyResourser[id].TimerEnd = $("#TimeMarketBuyResourserTitle"+id).data('timepicker').hour * 3600 +
$("#TimeMarketBuyResourserTitle"+id).data('timepicker').minute * 60
+$("#TimeMarketBuyResourserTitle"+id).data('timepicker').second  + moment().unix() ;



}
delete listMarketBuyResourser[id].fresh;
listMarketBuyResourser[id].TimerEndTEXT = $("#TimeMarketBuyResourserTitle"+id).val();
$('#datasend'+id+' input[id="AlldataMarketBuyResourser"]').val(JSON.stringify(listMarketBuyResourser[id]));
console.log(listMarketBuyResourser);
delete listMarketBuyResourser[id].change

