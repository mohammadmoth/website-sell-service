
var MarketSellResourser = {};


MarketSellResourser.run = $('#datasend'+id+' input[id="MarketSellResourserRun"]')[0].checked;


listMarketSellResourser[id] = MarketSellResourser;

listMarketSellResourser[id].MinSellByStorg = $("#MinSellByStorgMarketSellResourser"+id).val();



$('#datasend'+id+' input[id="AlldataMarketSellResourser"]').val(JSON.stringify(listMarketSellResourser[id]));
console.log(listMarketSellResourser);
delete listMarketSellResourser[id].change

