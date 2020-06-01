@section('scriptGetToSaveInFakeAttack')

//FakeAttack


var FakeAttack = JSON.parse( '{"FakeAttack":[] , "run" :'+$('#datasend'+id+' input[id="FakeAttackRun"]')[0].checked+'}' );
		 listFakeAttack[id] = FakeAttack;

		 $('#DateAllFakeAttakVilges'+id+' tr').each(function (a, b) {
        var idstart =  $(this).data('idstart');
        var timestart =  $(this).data('timestart');
        var timeend =  $(this).data('timeend');
        var x =   $(this).data('x');
        var y =  $(this).data('y');
		var fiertig =  $(this).data('fiertig');

				var count =  $(this).data('count');
				console.log(count);
				var spy =  $(this).data('spy');
    listFakeAttack[id].FakeAttack.push({ idstart: idstart, timestart: timestart, timeend: timeend , x: x  , y: y , fiertig: fiertig  , count: count ,spy:spy});
		$('#datasend'+id+' input[id="AlldataFakeAttack"]').val(JSON.stringify(listFakeAttack[id]));

				});



@endsection


@section('scriptAddTofileFakeAttack')


function clacAdd( bottenSend , id  ){
	$(bottenSend).attr("disabled",true);


		if ( $(document.querySelector('#datetimepickerTimeArriveA'+id+' > input')).val()=="" )
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


		if ( $(document.querySelector('#CountAttacKAdd'+id+' > input')).val()=="" )
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


		if (( $("#idOneVilgeFakeAttack"+id).val()  ).length == 0 )
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
		console.log(FilterAllVilge ($("#textviligeAddF"+id).val() ) );
		if ( FilterAllVilge ($("#textviligeAddF"+id).val() ) === false  )
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



	$.ajax({url:'/api/GetinfoworldById?id='+id, type: 'get'  ,  success :function(data) {
		console.log(data);
		if ( data.error == 0 )
		{




	var	Allvilige = [];

		Allvilige[0] = {

		x:	FilterAllVilge ($("#textviligeAddF"+id).val() ).x  ,
		y:	FilterAllVilge ($("#textviligeAddF"+id).val() ).y

		};


var unix = $('#datetimepickerTimeArriveA'+id).datetimepicker('viewDate').unix() + moment().utcOffset()*60;

var scacssc = false;
var	time  = 0;
												var vlige=  getviligeby(id,$("#idOneVilgeFakeAttack"+id).val()[0] );
												if ( vlige !==null)
												 {
												vlige.xy = FilterAllVilge(vlige.name);

													time = 	calculate_time_start_attack(vlige.xy.x,vlige.xy.y,Allvilige[0].x , Allvilige[0].y,data.units.ram.speed ,unix )

											var	timenow = moment().unix() + {{env('timeserverderffrent')}} ;
														if (time - 60 > timenow ){
															Allvilige[0].idstart = vlige.id;
															Allvilige[0].timestart = time;
															Allvilige[0].timeend = unix;
															Allvilige[0].fiertig = false;
															Allvilige[0].count = $('#CountAttacKAdd'+id).val();
															Allvilige[0].spy =  $('#SpyCountAdd'+id).val();
															Allvilige[0].end = true;
														scacssc = true;
														add_new_row(id,Allvilige);
														//EditeSetFakeAttak (time);
														$('#myModalFakeAttakAdd'+id).modal('hide');

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

function clacEdit( bottenSend ){
	$(bottenSend).attr("disabled",true);
var id= $('#idworld').val();

		if ( $(document.querySelector('#datetimepickerTimeArrive > input')).val()=="" )
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




	$.ajax({url:'/api/GetinfoworldById?id='+id, type: 'get'  ,  success :function(data) {
		console.log(data);
		if ( data.error == 0 )
		{




			var	Allvilige = [];
		Allvilige[0] = {

		 x : $($('tr[data-idnit="'+ $("#idintedintng").val()+'"]')[0]).data("x") ,
		 y : $($('tr[data-idnit="'+ $("#idintedintng").val()+'"]')[0]).data("y")

		};


var unix = $('#datetimepickerTimeArrive').datetimepicker('viewDate').unix() + moment().utcOffset()*60;

var scacssc = false;
var	time  = 0;
												var vlige=  getviligeby(id,$($('tr[data-idnit="'+ $("#idintedintng").val()+'"]')[0]).data("idstart") );
												if ( vlige !==null)
												 {
												vlige.xy = FilterAllVilge(vlige.name);

													time = 	calculate_time_start_attack(vlige.xy.x,vlige.xy.y,Allvilige[0].x , Allvilige[0].y,data.units.ram.speed ,unix )

											var	timenow = moment().unix() + {{env('timeserverderffrent')}} ;
														if (time - 60 > timenow ){
															Allvilige[0].idnit = $("#idintedintng").val();
															Allvilige[0].timestart = time;
															Allvilige[0].end= true;

														if ( ChkeNewEdit(id,Allvilige) )
															{ scacssc = true;

																EditeSetFakeAttak (time);
																$('#myModalFakeAttakEdit').modal('hide');
															}
															else
															{
																scacssc = false;
															}
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
		title: '@lang("Control.Error")',
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

function clac(id , bottenSend){
	$(bottenSend).attr("disabled",true);
		if ( $(document.querySelector('#datetimepicker'+id+' > input')).val()=="" )
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
	if ($($('#datasend'+id+' textarea[id="FakeAttackVi"]')[0]).val()=="" ){

		$.alert({
			title: '@lang("Control.Error")',
			content: '@lang("Control.EnterViligesAttakPlan")',
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

	if ( 	$($('#datasend'+id+' select[id="idviligeFakeAttack"]')[0]).val().length==0)
	{
		$.alert({
			title: '@lang("Control.Error")',
			content: '@lang("Control.SelectOneGroup")',
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

	let  Allvilige =  FilterAllVilges($($('#datasend'+id+' textarea[id="FakeAttackVi"]')[0]).val());
	if ( Allvilige.length == 0)
	{

		$.alert({
			title: '@lang("Control.Error")',
			content: '@lang("Control.NoAnyPostionX_YFinded")',
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
	let gropid = $($('#datasend'+id+' select[id="idviligeFakeAttack"]')[0]).val()[0];


	$.ajax({url:'/api/GetGroupsViligesId?id='+id+'&idgro='+gropid, type: 'get'  ,  success :function(data) {
		console.log(data);
		if ( data.error == 0 )
		{

		var unix = 	$('#datetimepicker'+id).datetimepicker('viewDate').unix() + moment().utcOffset()*60;

		console.log(Allvilige.length);
		console.log(	data.data.length);



		var loop = 0;
		var count = 0;
	for (;;){	var array = [];

	for (var i = 0; i < Allvilige.length ;  i++)
	 {
					if ( Allvilige[i].end == true)
					continue;

					Allvilige[i].end = false;

								for (var j = 0; j < data.data.length;j++ ) {
												var vlige=  getviligeby(id,data.data[j]);
												if ( vlige ===null)
												continue;
												vlige.xy = FilterAllVilge(vlige.name);
												//moment((time-moment().utcOffset()*60)*1000 ).format("YYYY-MM-DD HH:mm:ss");
												var	time = 	calculate_time_start_attack(vlige.xy.x,vlige.xy.y,Allvilige[i].x , Allvilige[i].y,data.units.ram.speed ,unix )
											//	console.log(time);
											var	timenow = moment().unix() + {{env('timeserverderffrent')}} ;
														if (time - 60 > timenow ){
															var stop = false;

																		for (var g = 0 ; g < array.length ; g++){
																			if (array[g]==vlige.id)
																				{	stop = true;
																				break;
																				}
																			}


																				if (stop)
																				continue;
															array.push(vlige.id);
															count++;
														//	console.log("start",time,vlige.xy.x  ,  vlige.xy.y  ,  Allvilige[i].x , Allvilige[i].y, data.units.ram.speed ,unix, "end");
															Allvilige[i].end = true;

															Allvilige[i].idstart = vlige.id;
															Allvilige[i].timestart = time;
															Allvilige[i].timeend = unix;
															Allvilige[i].fiertig = false;
															Allvilige[i].count = count = 1;
															Allvilige[i].spy =  $('#datasend'+id+' input[id="spyFakeAttack"]')[0].value;
														break;

														}
									}

		}
		if ( count >=Allvilige.length)
		break;

		if ( loop > Allvilige.length )
		break;
	loop++;	}
	add_new_row(id,Allvilige);
	console.log(Allvilige);
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

function sortfunction(a, b) {
	return a.timestart > b.timestart ? 1 : b.timestart > a.timestart ? -1 : 0;
  }

 function ChekAllfakeAttak(id,dataout)
 {
var FakeAttack = [] ;

	$('#DateAllFakeAttakVilges'+id+' tr').each(function (a, b) {
   var idstart =  $(this).data('idstart');
   var timestart =  $(this).data('timestart');
   var timeend =  $(this).data('timeend');
   var x =   $(this).data('x');
   var y =  $(this).data('y');
   var fiertig =  $(this).data('fiertig');

		   var count =  $(this).data('count');

		   var spy =  $(this).data('spy');
FakeAttack.push({ idstart: idstart, timestart: timestart, timeend: timeend , x: x  , y: y , fiertig: fiertig  , count: count ,spy:spy , end:true});


		   });

		   for (var i = 0 ; i < dataout.length ; i++ )
		   {


			FakeAttack.push({
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


		   FakeAttack.sort(sortfunction);
		   output = [] ;
		   for (var i = 0 ; i < FakeAttack.length ; i++ )
		   {
				if ( !(i + 1 < FakeAttack.length) )
				{
				output.push({
					idstart: FakeAttack[i].idstart,
					timestart: FakeAttack[i].timestart,
					timeend: FakeAttack[i].timeend ,
					x: FakeAttack[i].x  ,
						y: FakeAttack[i].y ,
						fiertig: FakeAttack[i].fiertig  ,
						count: FakeAttack[i].count ,
						spy:FakeAttack[i].spy,
						cantattkbytime :false,
						end:FakeAttack[i].end
					});

				}
			else if ( FakeAttack[i].timestart +{{env('maxtimefakeattakbttwen')}} < FakeAttack[i+1].timestart)
					{

						output.push({
							idstart: FakeAttack[i].idstart,
							 timestart: FakeAttack[i].timestart,
							 timeend: FakeAttack[i].timeend ,
							  x: FakeAttack[i].x  ,
							   y: FakeAttack[i].y ,
							   fiertig: FakeAttack[i].fiertig  ,
							   count: FakeAttack[i].count ,
							   spy:FakeAttack[i].spy,
							   cantattkbytime :false,
							   end:FakeAttack[i].end

							});

					}

					else
					{


						output.push({
							idstart: FakeAttack[i].idstart,
							 timestart: FakeAttack[i].timestart,
							 timeend: FakeAttack[i].timeend ,
							  x: FakeAttack[i].x  ,
							   y: FakeAttack[i].y ,
							   fiertig: FakeAttack[i].fiertig  ,
							   count: FakeAttack[i].count ,
							   spy:FakeAttack[i].spy,
							   cantattkbytime :true,
							   end:FakeAttack[i].end
							});


					}

		   }
return output;


}


function ChkeNewEdit(id,dataout)
{
var FakeAttack = [] ;

  $('#DateAllFakeAttakVilges'+id+' tr').each(function (a, b) {


  var idstart =  $(this).data('idstart');
  var timestart =  $(this).data('timestart');
  var timeend =  $(this).data('timeend');
  var x =   $(this).data('x');
  var y =  $(this).data('y');
  var fiertig =  $(this).data('fiertig');

		  var count =  $(this).data('count');

		  var spy =  $(this).data('spy');

		  if ( dataout[0].idnit ==
		  $(this).data('idnit') 	)
		  timestart = dataout[0].timestart;

FakeAttack.push({ idstart: idstart, timestart: timestart, timeend: timeend , x: x  , y: y , fiertig: fiertig  , count: count ,spy:spy , end:true });


		  });



		  FakeAttack.sort(sortfunction);
		   var out = true;

		  for (var i = 0 ; i < FakeAttack.length ; i++ )
		  {
			   if ( !(i + 1 < FakeAttack.length) )
			   {


			   }
		   else if ( FakeAttack[i].timestart +{{env('maxtimefakeattakbttwen')}} < FakeAttack[i+1].timestart)
				{


				}
				else
				{
				out =false;

				}

		  }
		  return out;


}

function add_new_row(idworld,dataout , notend = false)
{
	dataout = ChekAllfakeAttak(idworld,dataout);
		var markup = "";
		var text = "";

	for (var i = 0 ; i < dataout.length ;i ++){

		if ( dataout[i].cantattkbytime)
		{

			text += `@lang('Control.CAN_NOT_ATTAK_BETWEN_ATTACK'):{{env('maxtimefakeattakbttwen')}} ${dataout[i].x}|${dataout[i].y}
`
			continue;


		}



					if (dataout[i].end == true || notend )
					{
						//console.log(listViliges);
					var viligestart= 	getviligeby(idworld,dataout[i].idstart);

					if (viligestart == null)
					continue;

					if ( dataout[i].fiertig )
		var coole = 'background-color: #8151a05e;';
		else
		var coole = '';
					idint =Math.random();
						markup+=`<tr data-idnit = "${idint}"
					 	data-idstart="${dataout[i].idstart}"
						data-timestart="${dataout[i].timestart}"
						data-timeend="${dataout[i].timeend}"
						data-x="${dataout[i].x}"
						data-y="${dataout[i].y}"
						data-fiertig="${dataout[i].fiertig}"
						data-count="${dataout[i].count}"
						data-spy="${dataout[i].spy}"
						style="${coole}">
							<th>
								<div style="min-width: 80px;max-width: 80px;">
									<div class="input-group">
											<div class="input-group-prepend">
												</div>
											<input type="number" onchange="SetCountfakeAttaker(this,${idint})" min="1" value="${dataout[i].count}" id ="CountAttackFakeAttak"  max="4"    data-toggle="tooltip"  title="@lang("control.CountAttackFakeAttackTitle")" placeholder="@lang("control.CountAttackkFakeAttack")" class="form-control">
									</div>
									</div>
								</th>
								<td id="tdspyF">${dataout[i].spy}</th>
							<td  >${viligestart.name}</td>
							<td   >${dataout[i].x}|${dataout[i].y}</td>
							<td id="tdstartF"  >${moment((dataout[i].timestart-moment().utcOffset()*60)*1000 ).format("YYYY-MM-DD HH:mm:ss")}	</td>
							<td id="tdendF"  >${moment((dataout[i].timeend-moment().utcOffset()*60)*1000 ).format("YYYY-MM-DD HH:mm:ss")}	</td>
							<td>
								<input type="button"  onclick="openedit(${idint} , ${dataout[i].timeend} , ${dataout[i].count} , ${dataout[i].spy} ,${idworld} )"  value="@lang('Control.Edit')" class="form-control  btn-primary btn ">
												</td>
							<td>${XButtonForTab}</td>
							</tr>
							`;

					}
					else
					{
text += `@lang('Control.NoAnyViligeCanAttacInTime') ${dataout[i].x}|${dataout[i].y}
`
						;
					}
			}
			$("#DateAllFakeAttakVilges"+idworld).html("");
			$("#DateAllFakeAttakVilges"+idworld).append(markup);
			$($('#datasend'+idworld+' textarea[id="FakeAttackVi"]')[0]).val( text);


}
function calculate_time_start_attack(StartX, StartY , DistnationX , DistnationY , SpeedSlowerTroops,timeArrive){

				var distance =Math.pow((StartX - DistnationX),2) + Math.pow((DistnationY - StartY),2);
				//console.log(distance);

		times = 		Math.round(Math.sqrt(distance) * SpeedSlowerTroops * 60  );

	return	timeArrive - times ;
}
function getDataGroup(id,gropid ){

}

function SetCountfakeAttaker (info , key)
{
	if (! $.isNumeric ($(info).val() ))
	$(info).val(1)

	if ( 	$(info).val() > 4 )
	$(info).val(4);
	if ( 	$(info).val() < 1 )
	$(info).val(1);


	$($('tr[data-idnit="'+key+'"]')[0]).attr('data-count' ,$(info).val() );

}
function EditCountfakeAttaker (info)
{
	if (! $.isNumeric ($(info).val() ))
	$(info).val(1)

	if ( 	$(info).val() > 4 )
	$(info).val(4);
	if ( 	$(info).val() < 1 )
	$(info).val(1);


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

function openadd(id)
{

	$('#myModalFakeAttakAdd'+id).modal('show');

}


function EditeSetFakeAttak(timestart)
{


var SpyCount = $("#SpyCount").val();
var CountAttacKedit = $("#CountAttacKedit").val();
var timeend = $('#datetimepickerTimeArrive').datetimepicker('viewDate').unix() + moment().utcOffset()*60;


console.log("Start");
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
@section('FakeAttackkeys')

Object.keys(listFakeAttack).forEach(function (key) {
var markup = '' ;
var i = 0;
$($('#datasend'+key+' input[id="FakeAttackRun"]')[0]).prop('checked', listFakeAttack[key].run).change()
if (listFakeAttack[key].run )
$($('#datasend'+key+' div[id="FakeAttackformworld"]')[0]).css("color","green");

add_new_row(key,listFakeAttack[key].FakeAttack , true);




});

@endsection
@section('FakeAttackHtml')


 @endsection
