@section('scriptGetToSaveInSendAttakByTime')

//SendAttakByTime


if  (listSendAttakByTime[id]=== undefined)
listSendAttakByTime[id]={};

if ( !listSendAttakByTime[id].hasOwnProperty("data"))
listSendAttakByTime[id].data = [] ;


if ( !listSendAttakByTime[id].hasOwnProperty("run"))
listSendAttakByTime[id].run ={};

TypeSendAttakByTime.forEach(element => {
	//debugger;
	if ( $('#datasend'+id+' input[id="'+element+'Run"]').length !=0)
	listSendAttakByTime[id].run[element]=$('#datasend'+id+' input[id="'+element+'Run"]')[0].checked ;

});
$('#datasend'+id+' input[id="AlldataSendAttakByTime"]').val(JSON.stringify(listSendAttakByTime[id]));

@endsection


@section('scriptAddTofileSendAttakByTime')

</script>
<script>

var TypeSendAttakByTime=[
//"send_sniper_my_support",
"send_sniper_support",
"send_snob_attack",
"send_ram_cleaning_attack",
"send_anti_sniper_attack"];

var maxCountSendAttakByTime=4;

var TypeSendAttakByTimeSeletNow = -1;
var allfildeing =[
	"spearSendAttakByTime"
	,"swordSendAttakByTime"
	,"axeSendAttakByTime"
	,"archerSendAttakByTime"
	,"lightSendAttakByTime"
	,"spySendAttakByTime"
	,"marcherSendAttakByTime"
	,"heavySendAttakByTime"
	,"ramSendAttakByTime"
	,"catapultSendAttakByTime"
	,"SnobSendAttakByTime"
	,"knightSendAttakByTime"
	,"SupportFromPlayerSendAttakByTime"
	,"SupportFromTroSendAttakByTime"
	,"frommillscan"
	,"tomillscand"
    ,"staicofnbils"
];

function hideallfilde ()
{
	for (const key in allfildeing) {

			$("#"+allfildeing[key]+"_show").hide();

		}



}
var TypeTroopsSendByTime={
	/*"send_sniper_my_support":{
	"spear":"spearSendAttakByTime"
	,"sword":"swordSendAttakByTime"
	,"axe":"axeSendAttakByTime"
	,"archer":"archerSendAttakByTime"
	,"light":"lightSendAttakByTime"
	,"spy":"spySendAttakByTime"
	,"marcher":"marcherSendAttakByTime"
	,"heavy":"heavySendAttakByTime"
	,"ram":"ramSendAttakByTime"
	,"catapult":"catapultSendAttakByTime"
	,"snob":"SnobSendAttakByTime"
	},*/

	"send_sniper_support":{
	"spear":"spearSendAttakByTime"
	,"sword":"swordSendAttakByTime"
	,"axe":"axeSendAttakByTime"
	,"archer":"archerSendAttakByTime"
	,"light":"lightSendAttakByTime"
	,"spy":"spySendAttakByTime"
	,"marcher":"marcherSendAttakByTime"
	,"heavy":"heavySendAttakByTime"
	,"ram":"ramSendAttakByTime"
	,"catapult":"catapultSendAttakByTime"
	,"snob":"SnobSendAttakByTime"
	,"knight":"knightSendAttakByTime"
	,"SupportFromPlayer":"SupportFromPlayerSendAttakByTime"
	,"SupportFromTro":"SupportFromTroSendAttakByTime"
	,"frommillscan":"frommillscan"
	,"tomillscand":"tomillscand"
	},

	"send_snob_attack":{
		"spear":"spearSendAttakByTime"
	,"sword":"swordSendAttakByTime"
	,"axe":"axeSendAttakByTime"
	,"archer":"archerSendAttakByTime"
	,"light":"lightSendAttakByTime"
	,"spy":"spySendAttakByTime"
	,"marcher":"marcherSendAttakByTime"
	,"heavy":"heavySendAttakByTime"
	,"ram":"ramSendAttakByTime"
	,"catapult":"catapultSendAttakByTime"
	,"knight":"knightSendAttakByTime"
	,"snob":"SnobSendAttakByTime"
	,"frommillscan":"frommillscan"
	,"tomillscand":"tomillscand"
    ,"staicofnbils":"staicofnbils"
	},

	"send_ram_cleaning_attack":{
	"spear":"spearSendAttakByTime"
	,"sword":"swordSendAttakByTime"
	,"axe":"axeSendAttakByTime"
	,"archer":"archerSendAttakByTime"
	,"light":"lightSendAttakByTime"
	,"spy":"spySendAttakByTime"
	,"marcher":"marcherSendAttakByTime"
	,"heavy":"heavySendAttakByTime"
	,"ram":"ramSendAttakByTime"
	,"catapult":"catapultSendAttakByTime"
    ,"knight":"knightSendAttakByTime"
	,"frommillscan":"frommillscan"
	,"tomillscand":"tomillscand"
	},
	"send_anti_sniper_attack":{
	"spear":"spearSendAttakByTime"
	,"sword":"swordSendAttakByTime"
	,"axe":"axeSendAttakByTime"
	,"archer":"archerSendAttakByTime"
	,"light":"lightSendAttakByTime"
	,"spy":"spySendAttakByTime"
	,"marcher":"marcherSendAttakByTime"
	,"heavy":"heavySendAttakByTime"
	,"ram":"ramSendAttakByTime"
	,"catapult":"catapultSendAttakByTime"
    ,"knight":"knightSendAttakByTime"
	,"frommillscan":"frommillscan"
	,"tomillscand":"tomillscand"
	}

}




function show_SendAttakByTimeFelds()
{
	for (const key in TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]]) {
		if (TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]].hasOwnProperty(key)) {
			$("#"+TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]][key]+"_show").show();

		}
	}/*
	for (let index = 0; index < TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]].length; index++) {
		$("#"+TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]][index]+"_show").show();
	}*/

}
function send_sniper_support_show()
{
	maxCountSendAttakByTime = 4 ;
}
function send_snob_attack_show()
{
	maxCountSendAttakByTime = 5 ;
}
function send_ram_cleaning_attack_show()
{
	maxCountSendAttakByTime = 4 ;
}
function send_anti_sniper_attack_show()
{
	maxCountSendAttakByTime = 4 ;
}

function send_sniper_support_vier(pass)
{
	pass.frommillscan = 	$("#frommillscan").val();
	pass.tomillscand = 		$("#tomillscand").val();

	pass.SupportFromPlayerSendAttakByTime = 	$("#SupportFromPlayerSendAttakByTime").val();
	pass.SupportFromTroSendAttakByTime = 	$("#SupportFromTroSendAttakByTime").val();
	if ( ConvertToNumber( $("#SupportFromPlayerSendAttakByTime").val() ) + ConvertToNumber( $("#SupportFromTroSendAttakByTime").val() ) >=100 )
	return '@lang("Control.Max_100_SupportFromPlayerSendAttakByTime_PLUS_SupportFromTroSendAttakByTime")';

	return true;
}
function send_snob_attack_vier(pass)
{
	var key = "snob";
	if ( ConvertToNumber(	$("#"+TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]]["snob"]).val())  <= 0 )
		return '@lang("Control.PleaseEnterSnob")'

	pass.frommillscan = 	$("#frommillscan").val();
	pass.tomillscand = 	$("#tomillscand").val();
    pass.staicofnbils =document.querySelector("#staicofnbils").checked ;
	return true;
}
function send_ram_cleaning_attack_vier(pass)
{
	pass.frommillscan = 	$("#frommillscan").val();
	pass.tomillscand = 	$("#tomillscand").val();
	return true;
}
function send_anti_sniper_attack_vier(pass)
{
	pass.frommillscan = 	$("#frommillscan").val();
	pass.tomillscand = 	$("#tomillscand").val();
	return true;
}







function send_sniper_support_decun(pass)
{

	return 100/(1+(((ConvertToNumber(pass.SupportFromPlayerSendAttakByTime) + ConvertToNumber(pass.SupportFromTroSendAttakByTime) ))/100 ) ) ;
}
function send_snob_attack_decun(pass)
{
	return 100;

}
function send_ram_cleaning_attack_decun(pass)
{
	return 100;
}
function send_anti_sniper_attack_decun(pass)
{
	return 100;
}





function send_sniper_support_GetMaxNumberOfTroops(Troops)
{
	if (Troops.knight> 0 )
	return "knight";

	return true;
}
function send_snob_attack_GetMaxNumberOfTroops(Troops)
{
	return true;
}
function send_ram_cleaning_attack_GetMaxNumberOfTroops(Troops)
{
	return true;
}
function send_anti_sniper_attack_GetMaxNumberOfTroops(Troops)
{
	return true;
}




function clacAddSendAttakByTime( bottenSend , id   ){


	 id=  idsendattack ;
	$(bottenSend).attr("disabled",true);


		if ( $(document.querySelector('#datetimepickerTimeArriveSendAttakByTime'+' > input')).val()=="" )
		{

			$.alert({
				title: '@lang("Control.Error")',
				content: '@lang("Control.EnterDateAndTime")',
				typeAnimated: true,
				buttons: {
						tryAgain: {
								rtl: true,
								text: '@lang("login.Ok")',
								btnClass: 'btn',
								action: function(){
								}
						}

				}
			});
			$(bottenSend).removeAttr("disabled");

			return "";
		}


		if ( ConvertToNumber($("#CountAttackSendAttakByTime").val()) <=0 )
		{

			$.alert({
				title: '@lang("Control.Error")',
				content: '@lang("Control.CountAttackAdd")',
				typeAnimated: true,
				buttons: {
						tryAgain: {
								rtl: true,
								text: '@lang("login.Ok")',
								btnClass: 'btn',
								action: function(){
								}
						}

				}
			});
			$(bottenSend).removeAttr("disabled");

			return "";
		}


		if (( $("#idOneVilgeSendAttakByTime").val()  ).length == 0 )
		{

			$.alert({
				title: '@lang("Control.Error")',
				content: '@lang("Control.select_one_vilige")',
				typeAnimated: true,
				buttons: {
						tryAgain: {
								rtl: true,
								text: '@lang("login.Ok")',
								btnClass: 'btn',
								action: function(){
								}
						}

				}
			});
			$(bottenSend).removeAttr("disabled");

			return "";
		}
	//	console.log(FilterAllVilge ($("#textviligeAddF").val() ) );
		if ( FilterAllVilge ($("#textviligeAddF").val() ) === false  )
		{

			$.alert({
				title: '@lang("Control.Error")',
				content: '@lang("Control.PleaseEnterXYorSyleGood")',
				typeAnimated: true,
				buttons: {
						tryAgain: {
								rtl: true,
								text: '@lang("login.Ok")',
								btnClass: 'btn',
								action: function(){
								}
						}

				}
			});
			$(bottenSend).removeAttr("disabled");

			return "";
		}
		var	Allvilige = {};
		var fliterbytype = window[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]+'_vier'](Allvilige);
		if (	!(fliterbytype === true ))
		{
			$.alert({
				title: '@lang("Control.Error")',
				content: fliterbytype,
				typeAnimated: true,
				buttons: {
						tryAgain: {
								rtl: true,
								text: '@lang("login.Ok")',
								btnClass: 'btn',
								action: function(){
								}
						}

				}
			});
			$(bottenSend).removeAttr("disabled");

			return "";
		}


	$.ajax({url:'/api/GetinfoworldById?id='+id, type: 'get'  ,  success :function(data) {
		//console.log(data);
		if ( data.error == 0 )
		{







			Allvilige.x=	FilterAllVilge ($("#textviligeAddF").val() ).x  ;
		Allvilige.y=FilterAllVilge ($("#textviligeAddF").val() ).y ;




var unix = $('#datetimepickerTimeArriveSendAttakByTime').datetimepicker('viewDate').unix() + moment().utcOffset()*60;

var scacssc = false;
var	time  = 0;
					var vlige=  getviligeby(id,$("#idOneVilgeSendAttakByTime").val()[0] );
					if ( vlige !==null)
						{
					vlige.xy = FilterAllVilge(vlige.name);



					Allvilige.troops =  GetTroops ();


					var speedmaxunitName = GetMaxNumberOfTroops(Allvilige.troops);

					if (!data.units.hasOwnProperty(speedmaxunitName ) )
					{
						$.alert({
									title: '@lang("Control.Error")',
									content: "@lang("Control.MaxTimeUnitIsUnavailableInThisServerPleasePutUnitZero")",
									typeAnimated: true,
									buttons: {
											tryAgain: {
													rtl: true,
													text: '@lang("Control.ok")',
													btnClass: 'btn',
													action: function(){
													}
											}

											}
									});
									$(bottenSend).removeAttr("disabled");
									return;
					}
					var speedmaxunit = data.units[speedmaxunitName].speed ;
						time = 	calculate_time_start_attack(vlige.xy.x,vlige.xy.y,Allvilige.x , Allvilige.y, speedmaxunit ,unix ,window[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]+'_decun'](Allvilige) )  ;


				var	timenow = moment().unix() + {{env('timeserverderffrent')}} ;
				Allvilige.timestart = time;

							if ((time - 60 > timenow )&& ChekAllSendByTime(Allvilige)){
								Allvilige.idstart = vlige.id;

								Allvilige.timeend = unix;
								Allvilige.fiertig = 0;
								Allvilige.count = $('#CountAttackSendAttakByTime').val();
								Allvilige.end = true;


							add_new_row_sendbyTime(id,Allvilige);
							// {{--	//console.log(Allvilige);
							//EditeSetFakeAttak (time); --}}
							$('#myModalSendAttakByTimeAdd').modal('hide');
							$(bottenSend).removeAttr("disabled");
								return;

							}

						}
					if (! scacssc )
					{

									$.alert({
									title: '@lang("Control.Error")',
									content: "@lang("Control.CAN_NOT_ATTAK_CHANGE_TIME")",


									typeAnimated: true,
									buttons: {
											tryAgain: {
													rtl: true,
													text: '@lang("Control.ok")',
													btnClass: 'btn',
													action: function(){
													}
											}

											}
									});
					}

		$(bottenSend).removeAttr("disabled");


		}else
		{

	$(bottenSend).removeAttr("disabled");
		var sum ='';
		data.data.forEach(function(element) {
						sum += element+' <br>';});

			$.alert({
		title: '@lang("login.An_error")',
		content: sum,


		typeAnimated: true,
		buttons: {
				tryAgain: {
						rtl: true,
						text: '@lang("login.Try_again")',
						btnClass: 'btn',
						action: function(){
						}
				}

		}
	});

		}


	}

	, error :function(data){


		$(bottenSend).removeAttr("disabled");
	$.alert({
		title: '@lang("login.An_F")',
		content: '@lang("Control.ErrorContions_Error")',


		typeAnimated: true,
		buttons: {
				tryAgain: {
						rtl: true,
						text: '@lang("login.Ok")',
						btnClass: 'btn',
						action: function(){
						}
				}

		}
	});


	}} );

}

function GetMaxNumberOfTroops(Troops)
{
var maxnumber = 0 ;
var keymaxspped = 0 ;
var array= [
"snob"
,"catapult"
,"ram"
,"sword"
,"axe"
,"archer"
,"spear"
,"heavy"
,"knight"
,"marcher"
,"light"
,"spy"

];

		var data = window[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]+'_GetMaxNumberOfTroops'](Troops);
		if 	( !(data === true) )
		return data ;


		for (let index = 0; index < array.length; index++) {
			if ( Troops.hasOwnProperty(array[index]))
				if (Troops[array[index]] > 0  )
				return array[index];
		}


}

function ConvertToNumber(number)
{
if ( Number(number) !==NaN)
return  Number(number);
return 0;
}
{{-- جلب معلومات القوات جميعاً من اجل حفظ --}}
function GetTroops ()
{
	var array= [
"snob"
,"catapult"
,"ram"
,"sword"
,"axe"
,"archer"
,"spear"
,"heavy"
,"knight"
,"marcher"
,"light"
,"spy"
];

	var troops = {};
	for (const key in TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]])
	{
		var cont = false;
		for (let index = 0; index < array.length; index++) {
		if ( key === array[index] )
		{ cont = false;
			break;}
		cont = true;
		}
		if ( cont )
		continue;

		if (TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]].hasOwnProperty(key)) {

			troops[key]  = ConvertToNumber(	$("#"+TypeTroopsSendByTime[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]][key]).val());
		}
	}

	return troops ;
}

function sortfunction(a, b) {
	return a.timestart > b.timestart ? 1 : b.timestart > a.timestart ? -1 : 0;
  }

 function ChekAllSendByTime(dataout)
 {
	var SendAttakByTime = [] ;

	{{--/* $('#DateAllSendAttakByTimeVilges'+id+' tr').each(function (a, b) {
   var idstart =  $(this).data('idstart');
   var timestart =  $(this).data('timestart');
   var timeend =  $(this).data('timeend');
   var x =   $(this).data('x');
   var y =  $(this).data('y');
   var fiertig =  $(this).data('fiertig');
		   var count =  $(this).data('count');
		   var troops = [];
		   var type =  $(this).data('fiertig');

	SendAttakByTime.push({ idstart: idstart, timestart: timestart, timeend: timeend , x: x  , y: y , fiertig: fiertig  , count: count ,spy:spy , end:true});


		   });

		   for (var i = 0 ; i < dataout.length ; i++ )
		   {


			SendAttakByTime.push({
				idstart: dataout[i].idstart,
				 timestart: dataout[i].timestart,
				 timeend: dataout[i].timeend ,
				  x: dataout[i].x  ,
				   y: dataout[i].y ,
				   fiertig: dataout[i].fiertig  ,
				   count: dataout[i].count ,
				   spy:dataout[i].spy,
				   end:dataout[i].end
				});

			}
*/--}}

	if  (listSendAttakByTime[idsendattack]!== undefined)
		if ( listSendAttakByTime[idsendattack].hasOwnProperty("data") ){
            if ( Array.isArray(listSendAttakByTime[idsendattack].data))listSendAttakByTime[idsendattack].data.sort(sortfunction);  else listSendAttakByTime[idsendattack].data = []}

	 if  (listSendAttakByTime[idsendattack]!== undefined)
		if ( listSendAttakByTime[idsendattack].hasOwnProperty("data"))
			for (let index = 0; index < listSendAttakByTime[idsendattack].data.length; index++) {
				if ( 	Math.abs (listSendAttakByTime[idsendattack].data[index].timestart - dataout.timestart ) < {{env('maxtimefakeattakbttwen')}} )
					return false;
					}

	if  (listSendAttakByTime[idsendattack]=== undefined)
	listSendAttakByTime[idsendattack]={};

	if ( !listSendAttakByTime[idsendattack].hasOwnProperty("data"))
	listSendAttakByTime[idsendattack].data = [] ;

	dataout.typeIndex = TypeSendAttakByTimeSeletNow;
	listSendAttakByTime[idsendattack].data.push(dataout);


return true;


}


function ChkeNewEdit(id,dataout)
{
var SendAttakByTime = [] ;

  $('#DateAllFakeAttakVilges'+id+' tr').each(function (a, b) {


  var idstart =  $(this).data('idstart');
  var timestart =  $(this).data('timestart');
  var timeend =  $(this).data('timeend');
  var x =   $(this).data('x');
  var y =  $(this).data('y');
  var fiertig =  $(this).data('fiertig');

		  var count =  $(this).data('count');

		  var spy =  $(this).data('spy');

		  if ( dataout[0].idnit == $(this).data('idnit'))
		   timestart = dataout[0].timestart;

		SendAttakByTime.push({ idstart: idstart, timestart: timestart, timeend: timeend , x: x  , y: y , fiertig: fiertig  , count: count ,spy:spy , end:true });


		  });



		  SendAttakByTime.sort(sortfunction);
		   var out = true;

		  for (var i = 0 ; i < SendAttakByTime.length ; i++ )
		  {
			   if ( !(i + 1 < SendAttakByTime.length) )
			   {


			   }
		   else if ( SendAttakByTime[i].timestart +{{env('maxtimefakeattakbttwen')}} < SendAttakByTime[i+1].timestart)
				{


				}
				else
				{
				out =false;

				}

		  }
		  return out;


}
function add_new_row_array_sendbyTime(idworld,dataout )
{

		for (let index = 0; index < dataout.length; index++) {
            try {


            add_new_row_sendbyTime(idworld,dataout[index]);
              } catch (error) {

                  console.log(error);

            }

		}


}


function add_new_row_sendbyTime(idworld,dataout )
{


		var markup = "";
		var text = "";

						//console.log(listViliges);
					var viligestart= getviligeby(idworld,dataout.idstart);
					//	console.log(viligestart);
					if (viligestart == null)
					return;


						var troopsString = "";
					//	console.log(dataout.troops);


						for (const key in dataout.troops) {
						if ( dataout.troops[key] != 0 )
						troopsString +=
`<div style="
border: #796aee17;
border-style: groove;
width: fit-content;
font-size: larger;
font-family: cursive;
"><img src="/img/unit_${String(key )}.png">${ String(dataout.troops[key] )}</div>`;

							}
		var coole = '';
		if ( dataout.fiertig == 1 )
		var coole = 'background-color: #8151a05e;';
		else if ( dataout.fiertig == 2 )
		var coole = 'background-color: #414647;';

				//	console.log(troopsString);
             if(   !dataout.hasOwnProperty("idint"))
				dataout.idint =Math.random();
						markup+=`<tr data-idnit = "${dataout.idint}"
					 	data-idstart="${dataout.idstart}"
						data-timestart="${dataout.timestart}"
						data-timeend="${dataout.timeend}"
						data-x="${dataout.x}"
						data-y="${dataout.y}"
						data-fiertig="${dataout.fiertig}"
						data-count="${dataout.count}"
						data-troop="${dataout.troops}" style="${coole}">
							<th>
								<div style="min-width: 80px;max-width: 80px;">
									<div class="input-group">
											<div class="input-group-prepend">
												</div>
											<input type="number"  min="1" value="${dataout.count}"disabled  data-toggle="tooltip"  title="@lang("control.CountAttackSendAttakByTimeTitle")" placeholder="@lang("control.CountAttackkSendAttakByTime")" class="form-control">
									</div>
									</div>
								</th>
								<td id="tdtroopsAttackSendByTime">${troopsString}</th>
							<td  >${viligestart.name}</td>
							<td   >${dataout.x}|${dataout.y}</td>
							<td id="tdstartF"  >${moment((dataout.timestart-moment().utcOffset()*60)*1000 ).format("YYYY-MM-DD HH:mm:ss")}	</td>
							<td id="tdendF"  >${moment((dataout.timeend-moment().utcOffset()*60)*1000 ).format("YYYY-MM-DD HH:mm:ss")}	</td>
							<!--<td>
								<input type="button"  onclick="openedit(${dataout.idint} , ${dataout.timeend} , ${dataout.count} , ${dataout.troops} ,${idworld} )"  value="@lang('Control.Edit')" class="form-control  btn-primary btn ">
												</td> -->
							<td><button type="button" class="btn btn-link"   onclick="RemovethisItemSendByAttack(this,${dataout.idint},${idworld})" ><i class="fa fa-trash" aria-hidden="true"></i></button><button type="button" class="btn btn-link move down" onclick="updownx(this)"    ><i class="fa fa-long-arrow-down" aria-hidden="true"></i></button><button type="button" class="btn btn-link move up"  onclick="updownx(this)" ><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button></td>
							</tr>`;


							HtmlSetOnDataFromSendAttackByTime(markup, idworld , dataout.typeIndex);
}

function HtmlSetOnDataFromSendAttackByTime(markup,idworld , typeindex)
{


	$("#"+TypeSendAttakByTime[typeindex]+idworld).append(	//$("#"+TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]+idworld).html()+
	markup);

}
function calculate_time_start_attack(StartX, StartY , DistnationX , DistnationY , SpeedSlowerTroops,timeArrive , prosent = 100){

				var distance =Math.pow((StartX - DistnationX),2) + Math.pow((DistnationY - StartY),2);
				//console.log(distance);

		times = 		Math.round(Math.sqrt(distance) * SpeedSlowerTroops * 60   * prosent / 100) ;

	return	timeArrive - times ;
}
function SetCountSendAttakByTime (info , key)
{
	if (! $.isNumeric ($(info).val() ))
	$(info).val(1)

	if ( 	$(info).val() > 4 )
	$(info).val(4);
	if ( 	$(info).val() < 1 )
	$(info).val(1);


	$($('tr[data-idnit="'+key+'"]')[0]).attr('data-count' ,$(info).val() );

}
function EditCountSendAttakByTime (info)
{
	if (! $.isNumeric ($(info).val() ))
	$(info).val(1)

	if ( 	$(info).val() > maxCountSendAttakByTime )
	$(info).val(maxCountSendAttakByTime);
	if ( 	$(info).val() < 1 )
	$(info).val(1);


}

function EditMillScSendAttakByTime (info)
{


if ( ConvertToNumber($("#frommillscan").val()) >  ConvertToNumber($("#tomillscand").val())  )
{
	$("#tomillscand").val(($("#frommillscan").val() ));
	$("#frommillscan").val(($("#tomillscand").val()));


}


	if (! $.isNumeric ($("#frommillscan").val() ))
	$("#frommillscan").val(0)

	if ( ConvertToNumber ($("#frommillscan").val()) >=1000 )
	$("#frommillscan").val(999);


	if ( ConvertToNumber($("#frommillscan").val()) < 0 )
	$("#frommillscan").val(0);

	if (! $.isNumeric ($("#tomillscand").val() ))
	$("#tomillscand").val(0)

	if ( ConvertToNumber ($("#tomillscand").val()) >=1000 )
	$("#tomillscand").val(999);


	if ( ConvertToNumber($("#tomillscand").val()) < 0 )
	$("#tomillscand").val(0);

	if( (Math.abs( ConvertToNumber($("#frommillscan").val() ) - ConvertToNumber( $("#tomillscand").val() ) ) <50 ))
	{

		ConvertToNumber($("#frommillscan").val(100));
		ConvertToNumber($("#tomillscand").val(200));
	}


}
function RemovethisItemSendByAttack(bb,idint, id)
 {
for (const index in listSendAttakByTime[id].data) {
	if (  listSendAttakByTime[id].data[index].idint == idint )
	listSendAttakByTime[id].data.splice(index,1);;
	}


  var idt =  $(bb).closest ('tr').data('id');
  var idf = $(bb).closest ('form').data('id')
    $(bb).closest ('tr').remove ();


 }

function EditspyfakeAttaker (info)
{
	if (! $.isNumeric ($(info).val() ))
	$(info).val(0)

	if ( 	$(info).val() >100000 )
	$(info).val(100000);
	if ( 	$(info).val() < 0 )
	$(info).val(0);


}
function openedit(idint ,timeend  , count , spy,id)
{
	$('#myModalFakeAttakEdit').modal('show');
	$('#CountAttacKedit').val(count);
	$('#SpyCount').val(spy);
	$('#idintedintng').val(idint);
	$('#datetimepickerTimeArrive').datetimepicker('date' ,
	moment((timeend-moment().utcOffset()*60)*1000 ).format("DD.MM.YYYY, HH:mm:ss")
	);
	$('#timaTemps').val(timeend );
	$('#idworld').val(id)

}

var idsendattack = 0;
function openaddSendAttack(id , butten, type)
{

	idsendattack = id ;

	var listvalg = [];
	if ( typeof listViliges[id] !== 'undefined')
	{
		for (let index = 0; index < listViliges[id].length; index++) {
		listvalg.push({key:listViliges[id][index].id, value:listViliges[id][index].name});
		}

	}
	SetOptionsSelectBy("idOneVilgeSendAttakByTime",listvalg);

	hideallfilde();
	setsendtype(type);
	show_SendAttakByTimeFelds();

	window[TypeSendAttakByTime[TypeSendAttakByTimeSeletNow]+'_show']();

	$('#myModalSendAttakByTimeAdd').modal('show');

}
function setsendtype(type)
{
	TypeSendAttakByTimeSeletNow = -1;

	for (var i = 0 ; i < TypeSendAttakByTime.length ; i ++)
	{

		if ( TypeSendAttakByTime[i] == type )
		{	TypeSendAttakByTimeSeletNow = i ;  break;}



	}
}

function EditeSetFakeAttak(timestart)
{


var SpyCount = $("#SpyCount").val();
var CountAttacKedit = $("#CountAttacKedit").val();
var timeend = $('#datetimepickerTimeArrive').datetimepicker('viewDate').unix() + moment().utcOffset()*60;


$($('tr[data-idnit="'+ $("#idintedintng").val()+'"]')[0]).data("spy",SpyCount);
$($('tr[data-idnit="'+ $("#idintedintng").val()+'"]')[0]).data("timeend",timeend);
$($('tr[data-idnit="'+ $("#idintedintng").val()+'"]')[0]).data("count",CountAttacKedit);
$($('tr[data-idnit="'+ $("#idintedintng").val()+'"]')[0]).data("timestart",timestart);

$($('tr[data-idnit="'+ $("#idintedintng").val()+'"] input[id="CountAttackFakeAttak"]' )[0]).val(CountAttacKedit);

$($('tr[data-idnit="'+ $("#idintedintng").val()+'"] td[id="tdspyF"]')[0]).html(SpyCount);
$($('tr[data-idnit="'+ $("#idintedintng").val()+'"] td[id="tdstartF"]')[0]).html(moment((timestart-moment().utcOffset()*60)*1000 ).format("YYYY-MM-DD HH:mm:ss"));
$($('tr[data-idnit="'+ $("#idintedintng").val()+'"] td[id="tdendF"]')[0]).html(moment((timeend-moment().utcOffset()*60)*1000 ).format("YYYY-MM-DD HH:mm:ss"));

}
function FilterAllVilge(stringinput)
{
	var split = stringinput.match (/[^\s()]+/g)

	var array = false;
	//console.log(split);
	split.forEach(function(value, index) {
	var newvalue=	value.split('|');
	//console.log(isNaN(newvalue[1]));
	//console.log(isNaN(newvalue[0]));
		if ( !isNaN(newvalue[0]) && !isNaN(newvalue[1])  && newvalue[1] !="" && newvalue[0] !=""  )
		{	if ( newvalue[1].slice(0,4) >= 0 && newvalue[0].slice(0,4) >= 0 && newvalue[0].slice(0,4) <= 1000 && newvalue[1].slice(0,4) <= 1000)
				{
				array  = {
						x:newvalue[0],
						 y:newvalue[1]
						};

			  }else{
			  array = false;
			}}


	});

return array;

}

function FilterAllVilges(stringinput)
{
	var split = stringinput.match (/[^\s()]+/g)

	var array = [];

	split.forEach(function(value, index) {
	var newvalue=	value.split('|');

		if ( !isNaN(newvalue[0]) && !isNaN(newvalue[1])  && newvalue[1] !="" && newvalue[0] !=""  )
			if ( newvalue[1].slice(0,4) >= 0 && newvalue[0].slice(0,4) >= 0 && newvalue[0].slice(0,4) <= 1000 && newvalue[1].slice(0,4) <= 1000)
				{array.push({x:newvalue[0], y:newvalue[1]});

			  }



	});

	return array;

}




@endsection
@section('SendAttakByTimekeys')

Object.keys(listSendAttakByTime).forEach(function (key) {
var markup = '' ;
var i = 0;

Object.keys(listSendAttakByTime[key].run).forEach(function (keyx) {

$($('#datasend'+key+' input[id="'+keyx+'Run"]')[0]).prop('checked', listSendAttakByTime[key].run[keyx]).change();

if (listSendAttakByTime[key].run[keyx] )
$($('#datasend'+key+' div[id="'+keyx+'world"]')[0]).css("color","green");



});
if ( !Array.isArray(listSendAttakByTime[key].data ))
listSendAttakByTime[key].data = [];
add_new_row_array_sendbyTime(key,listSendAttakByTime[key].data );




});

@endsection
@section('SendAttakByTimeHtml')


 @endsection
