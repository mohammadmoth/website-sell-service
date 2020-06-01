@section('scriptGetToSaveInThifHelperPlayers')

//ThifHelperPlayers



var ThifHelperPlayers = JSON.parse( '{"ThifHelperPlayers":[] , "run" :'+$('#datasend'+id+' input[id="ThifHelperPlayersRun"]')[0].checked+'}' );
listThifHelperPlayers[id] = ThifHelperPlayers;

   var spear = $('#datasend'+id+' input[id="spearThifHelperPlayers"]')[0].value;
   var sword = $('#datasend'+id+' input[id="swordThifHelperPlayers"]')[0].value;
   var axe = $('#datasend'+id+' input[id="axeThifHelperPlayers"]')[0].value;
   var archer =  $('#datasend'+id+' input[id="archerThifHelperPlayers"]')[0].value; // new
   var marcher =  $('#datasend'+id+' input[id="marcherThifHelperPlayers"]')[0].value; // new
   var light =  $('#datasend'+id+' input[id="lightThifHelperPlayers"]')[0].value;
   var heavy =  $('#datasend'+id+' input[id="heavyThifHelperPlayers"]')[0].value;
   var ram =  $('#datasend'+id+' input[id="ramThifHelperPlayers"]')[0].value;
   var catapult =  $('#datasend'+id+' input[id="catapultThifHelperPlayers"]')[0].value;
   var spy =  $('#datasend'+id+' input[id="spyThifHelperPlayers"]')[0].value;

  // var MinStarog =  $('#datasend'+id+' input[id="MinStarogThifHelperPlayers"]')[0].value;
  console.log(id);

   var idg =$($('#datasend'+id+' select[id="idviligeThifHelperPlayers"]')[0]).val()

   var maxstep =  $('#datasend'+id+' input[id="maxstepThifHelperPlayers"]')[0].value;
   var playerPoints =  $('#datasend'+id+' input[id="PlayerMaxPorintsThifHelperPlayers"]')[0].value;
   var MaxWaitForNextList =  $('#datasend'+id+' input[id="MaxWaitForNextListThifHelperPlayers"]')[0].value;

   var viligesthif = [];
   $('#DateAllThifHelper'+id+' tr').each(function (a, b) {
    var x =      $(this).data('x');
    var y =      $(this).data('y');

    viligesthif.push({ x: x, y: y});

});

   listThifHelperPlayers[id].ThifHelperPlayers.push({
       maxstep:maxstep, playerPoints:playerPoints,
        spear: spear, sword: sword, axe: axe ,
        archer: archer  , marcher: marcher ,
         light: light  , heavy: heavy ,
         ram:ram ,catapult:catapult ,
         spy:spy  ,
          ram:ram,catapult:catapult
           ,idg:idg,
           viliges:viligesthif,
           MaxWaitForNextList:MaxWaitForNextList

        });


   $('#datasend'+id+' input[id="AlldataThifHelperPlayers"]').val(JSON.stringify(listThifHelperPlayers[id]));


@endsection


@section('scriptAddTofileThifHelperPlayers')

</script>
<script>



function AddTofilethifhelprViligesVilges(id)
{

        //	if (listbilding[id]

   var array= $('#datasend'+id+' input[id="ViligXYThif"]').val().split('|');
   console.log(array);
   if ( array.length != 2)
   return ;
      var x = array [0];
   var y = array [1];


var arraylet = $('#datasend'+id+' input[id="ViligXYThif"]').val();

   var  markup = `<tr  data-x='${x}' data-y='${y}'  ><td>${arraylet}</td><td>${XButtonForTab}</td></tr>`;
               $("#DateAllThifHelper"+id).append(markup);


}







@endsection
@section('ThifHelperPlayerskeys')

Object.keys(listThifHelperPlayers).forEach(function (key) {
var markup = '' ;
var i = 0;
$($('#datasend'+key+' input[id="ThifHelperPlayersRun"]')[0]).prop('checked', listThifHelperPlayers[key].run).change();

if (listThifHelperPlayers[key].run )
$($('#datasend'+key+' div[id="ThifHelperPlayersworld"]')[0]).css("color","green");

listThifHelperPlayers[key].ThifHelperPlayers.forEach(function(element) {

 	   $('#datasend'+key+' input[id="spearThifHelperPlayers"]')[0].value=element.spear;
       $('#datasend'+key+' input[id="swordThifHelperPlayers"]')[0].value   =element.sword ;
       $('#datasend'+key+' input[id="axeThifHelperPlayers"]')[0].value =element.axe ;
       $('#datasend'+key+' input[id="archerThifHelperPlayers"]')[0].value=element.archer  ; // new
       $('#datasend'+key+' input[id="marcherThifHelperPlayers"]')[0].value=element.marcher  ; // new
       $('#datasend'+key+' input[id="lightThifHelperPlayers"]')[0].value  =element.light  ;
       $('#datasend'+key+' input[id="heavyThifHelperPlayers"]')[0].value =element.heavy  ;

       $('#datasend'+key+' input[id="ramThifHelperPlayers"]')[0].value =   element.ram;
       $('#datasend'+key+' input[id="catapultThifHelperPlayers"]')[0].value =element.catapult;
       $('#datasend'+key+' input[id="spyThifHelperPlayers"]')[0].value = element.spy;
       $('#datasend'+key+' input[id="maxstepThifHelperPlayers"]')[0].value = element.maxstep;
       $('#datasend'+key+' input[id="PlayerMaxPorintsThifHelperPlayers"]')[0].value = element.playerPoints;

        if ( !element.hasOwnProperty("MaxWaitForNextList"))
        element.MaxWaitForNextList = "01:00";

       $('#datasend'+key+' input[id="MaxWaitForNextListThifHelperPlayers"]')[0].value = element.MaxWaitForNextList;

            try {

     if (  element.hasOwnProperty("viliges"))
          element.viliges.forEach(function(elementx) {
        markup +=      `<tr  data-x='${elementx.x}' data-y='${elementx.y}'  ><td>${elementx.x}|${elementx.y}</td><td>${XButtonForTab}</td></tr>`;
            });

        } catch (error) {

            }

         $("#DateAllThifHelper"+key).append(markup);



});



});

@endsection

@section('ThifHelperPlayersHtml')




@endsection
