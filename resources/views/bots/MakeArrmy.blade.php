@section('scriptGetToSaveInMakeArrmy')
//MakeArrmy


var MakeArrmy = JSON.parse( '{"MakeArrmy":[] , "run" :'+$('#datasend'+id+' input[id="MakeArrmyRun"]')[0].checked+'}' );
     listMakeArrmy[id] = MakeArrmy;

        var spear = $('#datasend'+id+' input[id="spearMakeArrmy"]')[0].value;
        var sword = $('#datasend'+id+' input[id="swordMakeArrmy"]')[0].value;
        var axe = $('#datasend'+id+' input[id="axeMakeArrmy"]')[0].value;
        var archer =  $('#datasend'+id+' input[id="archerMakeArrmy"]')[0].value; // new
        var marcher =  $('#datasend'+id+' input[id="marcherMakeArrmy"]')[0].value; // new
        var light =  $('#datasend'+id+' input[id="lightMakeArrmy"]')[0].value;
        var heavy =  $('#datasend'+id+' input[id="heavyMakeArrmy"]')[0].value;
        var ram =  $('#datasend'+id+' input[id="ramMakeArrmy"]')[0].value;
        var catapult =  $('#datasend'+id+' input[id="catapultMakeArrmy"]')[0].value;
        var spy =  $('#datasend'+id+' input[id="spyMakeArrmy"]')[0].value;
		var MinStarog =  $('#datasend'+id+' input[id="MinStarogMakeArrmy"]')[0].value;
		var idg =$($('#datasend'+id+' select[id="idviligeMakeArrmy"]')[0]).val()

        listMakeArrmy[id].MakeArrmy.push({ spear: spear, sword: sword, axe: axe , archer: archer  , marcher: marcher , light: light  , heavy: heavy ,ram:ram ,catapult:catapult ,spy:spy  , ram:ram,catapult:catapult,MinStarog:MinStarog ,idg:idg});
		$('#datasend'+id+' input[id="AlldataMakeArrmy"]').val(JSON.stringify(listMakeArrmy[id]));
        console.log(listMakeArrmy);


@endsection

@section('scriptAddTofileMakeArrmy')

@endsection
@section('MakeArrmykeys')

Object.keys(listMakeArrmy).forEach(function (key) {
var markup = '' ;
var i = 0;
$($('#datasend'+key+' input[id="MakeArrmyRun"]')[0]).prop('checked', listMakeArrmy[key].run).change()
if (listMakeArrmy[key].run )
$($('#datasend'+key+' div[id="MakeArrmyformworld"]')[0]).css("color","green");

listMakeArrmy[key].MakeArrmy.forEach(function(element) {

 	   $('#datasend'+key+' input[id="spearMakeArrmy"]')[0].value=element.spear;
       $('#datasend'+key+' input[id="swordMakeArrmy"]')[0].value   =element.sword ;
       $('#datasend'+key+' input[id="axeMakeArrmy"]')[0].value =element.axe ;
       $('#datasend'+key+' input[id="archerMakeArrmy"]')[0].value=element.archer  ; // new
       $('#datasend'+key+' input[id="marcherMakeArrmy"]')[0].value=element.marcher  ; // new
       $('#datasend'+key+' input[id="lightMakeArrmy"]')[0].value  =element.light  ;
       $('#datasend'+key+' input[id="heavyMakeArrmy"]')[0].value =element.heavy  ;

       $('#datasend'+key+' input[id="ramMakeArrmy"]')[0].value =   element.ram;
       $('#datasend'+key+' input[id="catapultMakeArrmy"]')[0].value =element.catapult;
       $('#datasend'+key+' input[id="spyMakeArrmy"]')[0].value = element.spy;
       $('#datasend'+key+' input[id="MinStarogMakeArrmy"]')[0].value = element.MinStarog;

});



});
@endsection
@section('MakeArrmyHtml')




									 @endsection
