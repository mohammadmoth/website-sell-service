<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BilidingHlper;
use App\Http\Controllers\Bilidingfile;
?>
@extends('layouts.controlp')



@section('content')


@section('BotsActive' , 'active')
<br>

<div class="col-lg-12">
	<div class="card">

		<div class="card-header d-flex align-items-center">
			<h3 class="h4 whitefont  ">@lang('Control.Bots')</h3>
		</div>
		<p></p>
		<div class="card-body">
                      <ul class="nav nav-tabs nav-justified">
                      @foreach ($worlds as $world)
                      <li class="nav-item">
                        <a class="nav-link "  data-toggle="tab"  href="#{{$world->link}}">{{$world->nameworld}}</a>
                      </li>
					@endforeach

                    </ul>

                 <div class="tab-content">
                   @foreach ($worlds as $world)

				<?php

				$worldid = $world->id;
				\App\RunBots\PermationUser::setupbyworld($worldid);

				$Loot_Assistant= json_decode( $world->jsonbotssettings);
				$Viligname = json_decode( $world->jsonbotdatas);



				if (isset ($Viligname->Groups))
						$Groups = $Viligname->Groups;
				else
						$Groups= null;

				if (isset ($Viligname->Allvligs->Allvligs)){
						$Viligname = $Viligname->Allvligs->Allvligs;

						usort($Viligname, array("App\Http\Controllers\HomeController","cmpX"));

					}
				else
				    $Viligname= null;

				if (isset($Loot_Assistant->Autotechup))
				    $AuthTche = $Loot_Assistant->Autotechup;
				        else
				            $AuthTche = 0 ;

	            if (isset($Loot_Assistant->CoinMaker)){
	                $coinMakerRun = $Loot_Assistant->CoinMaker->run;
	                $max =  $Loot_Assistant->CoinMaker->max;
	            }
	            else{
	                $coinMakerRun = 0 ;
	                $max = '';
	            }
	            //SendResSnob
	            if (isset($Loot_Assistant->SendResSnob)){
	                $SendResSnobRun = $Loot_Assistant->SendResSnob->run;

	            }
	            else{
	                $SendResSnobRun = 0 ;

	            }
	            ///BildingHelper
	            if (isset($Loot_Assistant->Bilidingfile)){
	                if(isset($Loot_Assistant->Bilidingfile->run)){
	                $BilidingfileRun = $Loot_Assistant->Bilidingfile->run;
	                }
	                else
	                {
	                    $BilidingfileRun = 0 ;
	                }

	            }
	            else{
	                $BilidingfileRun = 0 ;

	            }

	            //ResourceBalancer
	            if (isset($Loot_Assistant->ResourceBalancer)){
	                $ResourceBalancerRun = $Loot_Assistant->ResourceBalancer->run;
	                $ResourceBalancerWood  =  $Loot_Assistant->ResourceBalancer->Wood;
	                $ResourceBalancerStone =  $Loot_Assistant->ResourceBalancer->Stone;
	                $ResourceBalancerIron  =  $Loot_Assistant->ResourceBalancer->Iron;
	                $ResourceBalancerFields = $Loot_Assistant->ResourceBalancer->Fields;
	            }
	            else{
	                $ResourceBalancerWood  = 400000 ;
	                $ResourceBalancerStone = 400000 ;
	                $ResourceBalancerIron  = 400000 ;
	                $ResourceBalancerRun  = 0 ;
	                $ResourceBalancerFields = 0;
	            }
	            if (isset($Loot_Assistant->MakeNewNabil)){
	                $MakeNewNabilRun = $Loot_Assistant->MakeNewNabil->run;

	            }
	            else{
	                $MakeNewNabilRun  = 0 ;

	            }
	            //scavenge
	            if (isset($Loot_Assistant->scavenge)){
	                $scavengeRun = $Loot_Assistant->scavenge->run;

	            }
	            else{
	                $scavengeRun  = 0 ;

	            }
	            //scavenge
	            if (isset($Loot_Assistant->scavenge)){
	                $scavengeRun = $Loot_Assistant->scavenge->run;

	            }
	            else{
	                $scavengeRun  = 0 ;

	            }
	            //SendResourceViliges  // $SendResourceViligesRun
	            //scavenge
	            if (isset($Loot_Assistant->SendResourceViliges)){
	                $SendResourceViligesRun = $Loot_Assistant->SendResourceViliges->run;

	            }
	            else{
	                $SendResourceViligesRun  = 0 ;

	            }

	            //smashingwalls
	            if (isset($Loot_Assistant->smashingwalls)){
	                $smashingwallsRun = $Loot_Assistant->smashingwalls->run;
                    $smashingwallsMaxStep = $Loot_Assistant->smashingwalls->maxstep;
                    if ( isset ( $Loot_Assistant->smashingwalls->mark))
                    $smashingwallsMark =  $Loot_Assistant->smashingwalls->mark;
                    else
                        $smashingwallsMark = 3;

	            }
	            else{
	                $smashingwallsRun = 0;
                    $smashingwallsMaxStep =20;
                    $smashingwallsMark = 3;


	            }

	            //NewBarbarAttack
	            if (isset($Loot_Assistant->NewBarbarAttack)){
	                $NewBarbarAttackRun = $Loot_Assistant->NewBarbarAttack->run;
	                $NewBarbarAttackMaxStep = $Loot_Assistant->NewBarbarAttack->maxstep;
	            }
	            else{
	                $NewBarbarAttackRun = 0;
	                $NewBarbarAttackMaxStep =20;


							}
								//MakeArrmy
				if (isset($Loot_Assistant->MakeArrmy->MakeArrmy[0]->idg)){
	               $MakeArrmylist = $Loot_Assistant->MakeArrmy->MakeArrmy[0]->idg;
	            }
	            else{
					$MakeArrmylist =array();
				}
							//FakeAttack
				if (isset($Loot_Assistant->FakeAttack->FakeAttack[0]->idg)){
	               $FakeAttacklist = $Loot_Assistant->FakeAttack->FakeAttack[0]->idg; }
	            else{$FakeAttacklist =array();}

				//SendAttakByTime
			/*	if (isset($Loot_Assistant->SendAttakByTime)){
				   $SendAttakByTimelist = $Loot_Assistant->SendAttakByTime;

				}
				else{

					$SendAttakByTimelist =array();
				}*/
				//ThifHelperPlayers
				if (isset($Loot_Assistant->ThifHelperPlayers->ThifHelperPlayers[0])){
	               $ThifHelperPlayers = $Loot_Assistant->ThifHelperPlayers->ThifHelperPlayers[0];
				}
	            else{

					$ThifHelperPlayers =array();
				}


	            // MarketBuyResourser
	            if (isset($Loot_Assistant->MarketBuyResourser)){
	                $MarketBuyResourser = $Loot_Assistant->MarketBuyResourser;

	            }
	            else{
	             $MarketBuyResourser = null;

                }
                //MarketSellResourser
                if (isset($Loot_Assistant->MarketSellResourser)){
	                $MarketSellResourser = $Loot_Assistant->MarketSellResourser;

	            }
	            else{
	             $MarketSellResourser = null;

                }



				if (!isset($Loot_Assistant->Loot_Assistant)){
				    $Loot_Assistant= $EmptyLA;
				//    $BilidingHlper = $Loot_Assistant->BilidingHlper;
				}

	   			else {
	   			 //   $BilidingHlper = array();
				    $Loot_Assistant= $Loot_Assistant->Loot_Assistant;
				}


				?>
                <div id="{{$world->link}}" class="tab-pane fade " style='display: nono'; >

@include('bots.MakeArrmy' )
@include('bots.FakeAttack' )
@include('bots.SendAttakByTime' )
@include('bots.ThifHelperPlayers' )

                <form  action='' method = 'POST' class="form-horizontal" id='datasend{{$world->id}}' data-id='{{$world->id}}'>
				@csrf

				<input type="hidden" name ='id' value='{{$world->id}}'>
					  <!--               Start Theif            -->
               <div class = 'card-body' >

                <input type='hidden' value='0' name='run'>
                <input type='hidden' value='0' name='runnopro'>
                <input type='hidden' value='' id='AlldataBiliding' name='AlldataBiliding'>
                <input type='hidden' value='' id='AlldataCoinMaker' name='AlldataCoinMaker'>
                <input type='hidden' value='' id='AlldataSendResSnob' name='AlldataSendResSnob'>
                <input type='hidden' value='' id='AlldataResourceBalancer' name='AlldataResourceBalancer'>
                <input type='hidden' value='' id='AlldataMakeNewNabil' name='AlldataMakeNewNabil'>
                <input type='hidden' value='' id='Alldatascavenge' name='Alldatascavenge'>
                <input type='hidden' value='' id='AlldataSetException' name='AlldataSetException'>
                <input type='hidden' value='' id='AlldataSendResourceViliges' name='AlldataSendResourceViliges'>
                <input type='hidden' value='' id='AlldataNewBarbarAttack' name='AlldataNewBarbarAttack'>
                <input type='hidden' value='' id='Alldatasmashingwalls' name='Alldatasmashingwalls'>
                <input type='hidden' value='' id='AlldataMarketBuyResourser' name='AlldataMarketBuyResourser'>
                <input type='hidden' value='' id='AlldataMarketSellResourser' name='AlldataMarketSellResourser'>
                <input type='hidden' value='' id='AlldataMakeArrmy' name='AlldataMakeArrmy'>
				<input type='hidden' value='' id='AlldataFakeAttack' name='AlldataFakeAttack'>
				<input type='hidden' value='' id='AlldataSendAttakByTime' name='AlldataSendAttakByTime'>
				<input type='hidden' value='' id='AlldataThifHelperPlayers' name='AlldataThifHelperPlayers'>

                <input type='hidden' value='0' name='A'>
                        <input type='hidden' value='0' name='B'>
                            <input type='hidden' value='0' name='C'>
               <div>  <input type="checkbox" id="run" data-id="{{$world->id}}"  name="run" @if($world->run) checked @endif value='1' data-toggle="toggle" data-on="RunOnPro" data-off="OffOnPro" data-width= '120px'></div>
			  @if ( \App\RunBots\PermationUser::getifnonpro() )
			   <div>  <input type="checkbox" id="runnopro" data-id="{{$world->id}}" name="runnopro" @if($world->runnopro) checked @endif value='1' data-toggle="toggle" data-on="RunNoNPro" data-off="OffNoNPro" data-width= '120px' data-onstyle="danger" ></div>
			   @endif
                 <div class='d-flex flex-row-reverse'>  <input type="button" onclick = 'submitForm(this,{{$world->id}})' id='SendData' value = 'save' class='btn' ></div>
                  <hr> <div class="h4 red" data-id="0form"@if(isset($Loot_Assistant->run)) @if ($Loot_Assistant->run) style="
                  color: green;
              " @endif
              @endif
               onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.Bottheftassistant')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("Thif") )
                  <div class="form-group row" style="display: none;" id='0form'>
									<h1></h1>


                          <label class="col-sm-3 form-control-label">@lang('Control.InputPramter')</label>
                          <div class="col-sm-9">
															<div class="row">
																	<div class="form-group col-md-3 ">
																 <input type="checkbox" @if(isset($Loot_Assistant->run)) @if($Loot_Assistant->run) checked @endif @endif name='BottheftassistantRun' id='BottheftassistantRun'  value='1' data-toggle="toggle" data-on="Run" data-off="Off">
															</div>
															</div>
                            <div class="row">

															<div class="col-md-3">
                                    <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" alt="" ></div>
                                </div>
                                 <input type="number" min="0" value="{{$Loot_Assistant->array_light}}" id= 'array_light' name='light' max="99999" data-toggle="tooltip"   title="@lang('Control.lightTitle')" placeholder="@lang('Control.lights')" class="form-control">

                              </div>
                              </div>


                                <div class="col-md-3">
                                    <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-clock-o" style="font-size:23px"></i>
                                                </div>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <input  id="TiemMax" name='TiemMaxForListSteel'  value="{{$Loot_Assistant->TiemMax}}" type="text" class="form-control input-small formales5565"  data-toggle="tooltip"  title="@lang('Control.TimeMaxtitle')"  class="form-control" >
                                                            </div>
                                            </div>
                                    </div>
                                </div>

                               <div class="col-md-3">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/resou.png" >
                                 			 </div>
                               			</div>
                         			  <input type="number" min="0" value="{{$Loot_Assistant->ResressMinC}}"  id='ResressMinC' name='ResourcesMinForC' max="99999"    data-toggle="tooltip"  title="@lang('Control.ResressMinCtitle')" placeholder="@lang('Control.resources')" class="form-control">
                            		  </div>
                               </div>
                               <div class="col-md-3">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/resou.png">
                                 			 </div>
                               			</div>
                         			  <input type="number" min="0" value="{{$Loot_Assistant->ResressMAXC}}"  id ='ResressMAXC'name='ResourcesMaxForC' max="99999"    data-toggle="tooltip"  title="@lang('Control.ResressMAXCtitle')" placeholder="@lang('Control.resources')" class="form-control">
                            		  </div>
                               </div>
                               <div class="col-md-3">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/wall.png" >
                                 			 </div>
                               			</div>
                         			  <input type="number" min="0" value="{{$Loot_Assistant->WallMAX}}"  id= 'WallMAX' name='WallMax' max="99999"    data-toggle="tooltip"  title="@lang('Control.WallMAXtitle')" placeholder="@lang('Control.wall')" class="form-control">
                            		  </div>
                               </div>
                               <div class="col-md-3">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/rechts.png"  height="16" width="16" >
                                 			 </div>
                               			</div>
                         			  <input type="number" min="0" value="{{$Loot_Assistant->stepMAX}}"  id='stepMAX' name='stepMax' max="99999"   data-placement="bottom"   data-toggle="tooltip"  title="@lang('Control.stepMAXtitle')" placeholder="@lang('Control.stepMAX')" class="form-control">
                            		  </div>
                               </div>

                               <div class="col-md-3">
																	<div class="input-group">
																			<div class="input-group-prepend">
																				 <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-clock-o" style="font-size:23px"></i>
																				 </div>
																						 <div class="input-group bootstrap-timepicker timepicker">
																							 <input  value="{{$Loot_Assistant->TiemMin}}" id='TiemMin' name='TiemMinForListSteel' type="text" class="form-control input-small formales5565"  data-toggle="tooltip"  title="@lang('Control.TimeMintitle')"  class="form-control" >
																							 </div>
																			 </div>
																	 </div>
                               </div>
               					 <div class="col-md-3">
                                	<div class="input-group">
                               			<div class="input-group-prepend">

                               			</div>
                               			<div title="@lang('Control.Atitle')" data-placement="bottom"  data-toggle="tooltip" >
                         			       <input type="checkbox" name="A" @if($Loot_Assistant->A) checked @endif  value='1' data-toggle="toggle " data-on="A" data-off="Off">
                         			        </div>
                         			        <div title="@lang('Control.Btitle')" data-placement="bottom"  data-toggle="tooltip" >  <input type="checkbox" name="B" @if($Loot_Assistant->B) checked @endif   value='1' title="@lang('Control.Btitle')" data-toggle="toggle" data-on="B" data-off="Off">
                         			         </div>
                         			         <div title="@lang('Control.Ctitle')" data-placement="bottom"  data-toggle="tooltip" >
                         			         <input type="checkbox"  value='1'  title="@lang('Control.Ctitle')" data-toggle="toggle" @if($Loot_Assistant->C) checked @endif    name="C" data-on="C" data-off="Off">   </div>

                            		  </div>
                               </div>


                            </div>
                          </div>
                        </div>



                  @endif
				</div>

                 <!--     End Assest Thief Helper -->

                	  <!-- Start Bilding Helper            -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " data-id="1form" @if ($BilidingfileRun) style="
                    color: green;
                " @endif

                  onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.BildingHelper')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("BilidingUpdade")  || \App\RunBots\PermationUser::checkup("BilidingUpdadeNoPor") )
                  <div class="form-group row" style="display: none;" id='1form' >
                 	 <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.InputPramter')</label>
                          <div class="col-sm-9">
                            <div class="row">


                             <div class="form-group col-md-3 ">
                            <input type="checkbox" id='BilidingfileRun' @if($BilidingfileRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div></div>
                            <div class="row">



                                     			 <div class="form-group col-md-3 ">
                                	<label for="Status">@lang('Control.Bliding')</label>
                                		<select id='selectType' class="form-control input-material" id="Bliding" form="datasend{{$world->id}}" required >

    						<option value="main">@lang('Control.main')</option>
								<option value="barracks">@lang('Control.barracks')</option>
								<option value="stable">@lang('Control.stable')</option>
								<option value="garage">@lang('Control.garage')</option>
								<option value="smith">@lang('Control.smith')</option>
								<option value="place">@lang('Control.place')</option>
								<option value="market">@lang('Control.market')</option>
								<option value="wood">@lang('Control.wood')</option>
								<option value="stone">@lang('Control.stone')</option>
								<option value="iron">@lang('Control.iron')</option>
								<option value="farm">@lang('Control.farm')</option>
								<option value="storage">@lang('Control.storage')</option>
								<option value="hide">@lang('Control.hide')</option>
								<option value="wall">@lang('Control.wall')</option>
								<option value="statue">@lang('Control.statue')</option>
								<option value="snob">@lang('Control.snob')</option>
                                    		  </select>

                                     			 </div>


                                     			 <div class="form-group col-md-3 ">
                                	<label for="Status">@lang('Control.level')</label>
                                		<input type="number" id='inputnumberoflevelupdate' min="0" value=""  max="99999" data-toggle="tooltip"  class="form-control">

                                     			 </div>

                                     			 	 <div class="form-group col-md-3 ">
                                	<label for="AddBuild">@lang('Control.AddToTab')</label>

                                    <input type="button"  onclick="AddTofileBilding({{$world->id}})" id="AddBuild" value="Add" class="form-control  btn-primary btn ">
                                     			 </div>
                                     			  </div>
                                     			   </div>
               					<!--  Table Start -->
                              <div class="table-responsive">
                        <table class="table ">
                          <thead>
                            <tr>

                              <th>@lang('Control.village')</th>
                              <th>@lang('Control.Building')</th>
                              <th>@lang('Control.Event')</th>
                            </tr>
                          </thead>
                          <tbody id="DateAllBilding{{$world->id}}">
                          <!-- Loop All Data start -->



                               <!-- Loop All Data end -->


                          </tbody>
                        </table>
                      </div>

                      <!--  Table end -->


                </div>@endif




				</div>

                 <!--     End Bilding Helper  -->
                 <!-- Start Auto tech up            -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " data-id="2form" @if ($AuthTche) style="
                  color: green;
              " @endif  onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.Autotechup')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("AuthTuch") )
                  <div class="form-group row" style="display: none;" id='2form'>
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.OnOff')</label>
                          <div class="col-sm-9">
                            <div class="row">
                            <input type='hidden' value='0' name='AuthTche'>
                            <input type="checkbox" name="AuthTche" @if($AuthTche) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div>
                 			   </div>
						       </div>




                @endif</div>

                 <!--     End Auto tech up  -->
                                  <!-- Start coinMaker          -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  "  data-id="3form"   @if ($coinMakerRun) style="
                  color: green;
              " @endif  onclick = 'hideshow(this,{{$world->id}})'   > @lang('Control.coinMaker')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("CoinMakerBot") )
                  <div class="form-group row" style="display: none;" id='3form' >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

                          <div class="col-sm-9">
                            <div class="row">


                             <div class="form-group col-md-3 ">
                            <input type="checkbox" id='coinMakerRun' @if($coinMakerRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div></div>
                 			  <div class="row">

                 			   <div class="col-md-3">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/gold.png" >
                                 			 </div>
                               			</div>
                         			  <input type="number" min="0" value="{{$max}}" id='MaxCoin' max="99999"  data-placement="bottom"    data-toggle="tooltip"  title="@lang('Control.Maxcointitle')" placeholder="@lang('Control.Maxcoin')" class="form-control">
                            		  </div>
                               </div>

                 			  	 <div class="form-group col-md-9 col-sm-9">
                            <select id='namevileg' class="form-control">
                            @if ($Viligname!= null)
                           @foreach ($Viligname as $name )
                          	 @if (isset($name->name))
                              <option value='{{$name->id}}'>{{$name->name}}</option>
                     			 @endif

                              @endforeach
                              @endif
                            </select>
                            </div>
                           <div class="form-group col-md-2  col-sm-3 ">
                          <input type="button"  onclick="AddTofileCoinVilges({{$world->id}})" value="Add" class="form-control  btn-primary btn ">
                          </div>

                 			</div>

                 			<!-- Tab -->
                 		<table class="table ">
                          <thead>
                            <tr>
                              <th>@lang('Control.village')</th>
                              <th>@lang('Control.Event')</th>
                            </tr>
                          </thead>
                          <tbody id="DateAllCoinVilges{{$world->id}}">
                          <!-- Data-->



                          </tbody>
                        </table>


                 			<!--  Tab -->
                 			   </div>
						       </div>
							   @endif </div>

                 <!--     End coinMaker  -->


                  <!-- Start Send Res to sonp  -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " @if ($SendResSnobRun) style="
                  color: green;
              " @endif data-id="4form"   onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.SendResSnob')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("SendResSnob") )
                  <div class="form-group row" style="display: none;" id='4form' >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

                          <div class="col-sm-9">
                            <div class="row">


                             <div class="form-group col-md-3 ">
                            <input type="checkbox" id='SendResSnobRun' @if($SendResSnobRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div></div>
                 			  <div class="row">

                 			   <div class="col-md-2" style="min-width: 194px;">
																	<div class="input-group">
																			<div class="input-group-prepend">
																				 <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-clock-o" style="font-size:23px"></i>
																				 </div>
																						 <div class="input-group bootstrap-timepicker timepicker">
																							 <input  id='timeofsenddatasnop' value="00:19:59" type="text" class="form-control input-small formales5565"   class="form-control" >
																							 </div>
																			 </div>
																	 </div>
                          </div>

                 			  	 <div class="form-group col-md-9 col-sm-9">
                            <select id='namevileg2' class="form-control">
                            @if ($Viligname!= null)
                           @foreach ($Viligname as $name )
                          	 @if (isset($name->name))
                              <option value='{{$name->id}}'>{{$name->name}}</option>
                     			 @endif

                              @endforeach
                              @endif
                            </select>
                            </div>
                           <div class="form-group col-md-2  col-sm-3  ">
                          <input type="button"  onclick="AddTofileSendResSnobVilges({{$world->id}})" value="Add" class="form-control  btn-primary btn ">
                          </div>

                 			</div>

                 			<!-- Tab -->
                 		<table class="table ">
                          <thead>
                            <tr>
                              <th>@lang('Control.village')</th>
                                <th>@lang('Control.Time')</th>
                              <th>@lang('Control.Event')</th>
                            </tr>
                          </thead>
                          <tbody id="DateAllSendResSnobVilges{{$world->id}}">
                          <!-- Data-->



                          </tbody>
                        </table>


                 			<!--  Tab -->
                 			   </div>
						       </div>@endif
          				     </div>

                 <!--     End  Send Res to sonp   -->
                 <!-- Start ResourceBalancer  -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " @if ($ResourceBalancerRun) style="
                  color: green;
              " @endif
               data-id="5form"   onclick = 'hideshow(this,{{$world->id}})'  > @lang('Control.ResourceBalancer')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("ResourceBalancer") )
                  <div class="form-group row" style="display: none;" id='5form'>
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

                          <div class="col-sm-9">
                            <div class="row">


                             <div class="form-group col-md-2 ">
                            <input type="checkbox" id='ResourceBalancerRun' @if($ResourceBalancerRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div></div>
                 			  <div class="row">
                 			   <div class="form-group col-md-2 ">
                            <input type="checkbox" id='ResourceBalancerWood' @if($ResourceBalancerWood == 0) checked @endif value='1' data-toggle="toggle" data-on="Wood" data-off="Off" data-width= '80px' >
                 			  </div>
                 			   <div class="form-group col-md-2 ">
                            <input type="checkbox" id='ResourceBalancerStone' @if($ResourceBalancerStone == 0) checked @endif value='1' data-toggle="toggle" data-on="Stone" data-off="Off"  data-width= '80px' >
                 			  </div>
                 			   <div class="form-group col-md-2 ">
                            <input type="checkbox" id='ResourceBalancerIron' @if($ResourceBalancerIron == 0) checked @endif value='1' data-toggle="toggle" data-on="Iron" data-off="Off" data-width= '80px' >
                 			  </div>

                 			  <div class="form-group col-md-6 ">
                            <select id='ResourceBalancerFields' class="form-control">
                            <option  @if ($ResourceBalancerFields ==0)selected @endif  value='0'>@lang('Control.Unlimited')</option>
                            <option @if ($ResourceBalancerFields ==25)selected @endif value='25'>@lang('Control.< 25 Fields')</option>
                            <option @if ($ResourceBalancerFields ==50)selected @endif  value='50'>@lang('Control.< 50 Fields')</option>
                            <option  @if ($ResourceBalancerFields ==100)selected @endif value='100'>@lang('Control.< 100 Fields')</option>
                            </select>
                            </div>



                 			  	 <div class="form-group col-md-9 col-sm-9">
                            <select id='namevileg3' class="form-control">
                            @if ($Viligname!= null)
                           @foreach ($Viligname as $name )
                          	 @if (isset($name->name))
                              <option value='{{$name->id}}'>{{$name->name}}</option>
                     			 @endif

                              @endforeach
                              @endif
                            </select>
                            </div>
                           <div class="form-group col-md-2  col-sm-3  ">
                          <input type="button"  onclick="AddTofileResourceBalancerVilges({{$world->id}})" value="Add" class="form-control  btn-primary btn ">
                          </div>

                 			</div>

                 			<!-- Tab -->
                 		<table class="table ">
                          <thead>
                            <tr>
                              <th>@lang('Control.village')</th>

                              <th>@lang('Control.Event')</th>
                            </tr>
                          </thead>
                          <tbody id="DateAllResourceBalancerVilges{{$world->id}}">
                          <!-- Data-->



                          </tbody>
                        </table>


                 			<!--  Tab -->
                 			   </div>
						       </div>@endif
          				     </div>

                 <!--     End  ResourceBalancer   -->

                  <!-- Start Send Res to sonp  -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " data-id="6form"  @if ($MakeNewNabilRun) style="
                  color: green;
              " @endif
               onclick = 'hideshow(this,{{$world->id}})'  > @lang('Control.MakeNewNabil')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("MakeNewNabilBot") )
                  <div class="form-group row" style="display: none;" id='6form' >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

                          <div class="col-sm-9">
                            <div class="row">


                             <div class="form-group col-md-3 ">
                            <input type="checkbox" id='MakeNewNabilRun' @if($MakeNewNabilRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div></div>
                 			  <div class="row">

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_snob.png" alt="" ></i>
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='numberofNabil'  max="99999"    data-toggle="tooltip"  title="@lang('Control.NabilCountTitle')" placeholder="@lang('Control.NabilCount')" class="form-control">

                            		  </div>
                               </div>

                 			  	 <div class="form-group col-md-9 col-sm-9">
                            <select id='namevileg4' class="form-control">
                              <option value="" selected  hidden>@lang('Control.do_not_select_if_you_wont_select_group')</option>

                            @if ($Viligname!= null)
                           @foreach ($Viligname as $name )
                          	 @if (isset($name->name))
                              <option value='{{$name->id}}'>{{$name->name}}</option>
                     			 @endif

                              @endforeach
                              @endif
                            </select>
                            </div>

                            <div class="col-md-3" style="min-width: 194px;">
                                <div class="input-group">
                                            <select  name="lstStates"   title="@lang('Control.SelectGrupeTitel')"   data-toggle="tooltip"  multiple data-live-search="true" data-max-options="1" id="idviligenewnabels">

                                                @if ($Groups!= null)

                                                @foreach ($Groups[0] as $name )
                                                     <option value='{{$name->id}}'>{{$name->name}} </option>
                                                @endforeach
                                                 @endif
                                            </select>

                                    </div>
                                </div>

                           <div class="form-group col-md-2  col-sm-3  ">
                          <input type="button"  onclick="AddTofileMakeNewNabilVilges({{$world->id}})" value="Add" class="form-control  btn-primary btn ">
                          </div>

                 			</div>

                 			<!-- Tab -->
                 		<table class="table ">
                          <thead>
                            <tr>
                              <th>@lang('Control.village')</th>
                                <th>@lang('Control.Count')</th>
                              <th>@lang('Control.Event')</th>
                            </tr>
                          </thead>
                          <tbody id="DateAllMakeNewNabilVilges{{$world->id}}">
                          <!-- Data-->



                          </tbody>
                        </table>


                 			<!--  Tab -->
                 			   </div>
						       </div>@endif
          				     </div>

                 <!--     End  Send Res to sonp   -->
                 <!-- Start scavenge -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " @if ($scavengeRun) style="
                  color: green;
              " @endif
               data-id="7form"   onclick = 'hideshow(this,{{$world->id}})'  > @lang('Control.scavenge')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("scavengeNoPor") || \App\RunBots\PermationUser::checkup("scavengebot")  )
                <div style="display: none;" id='7form' >
                  <div class="form-group row" >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings defense')</label>

                          <div class="col-sm-9">
                            <div class="row">


                             <div class="form-group col-md-3 ">
                            <input type="checkbox" id='scavengeRun' @if($scavengeRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                               </div></div>

                 			  <div class="row"> <!-- DEFNT -->

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearscavengeD'  max="99999"    data-toggle="tooltip"  title="@lang('Control.spearscavengetTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordscavengeD'  max="99999"    data-toggle="tooltip"  title="@lang('Control.swordscavengetTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axescavengeD'  max="99999"    data-toggle="tooltip"  title="@lang('Control.axescavengetTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerscavengeD'  max="99999"    data-toggle="tooltip"  title="@lang('Control.archerscavengetTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightscavengeD'  max="99999"    data-toggle="tooltip"  title="@lang('Control.lightscavengetTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherscavengeD'  max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherscavengetTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyscavengeD'  max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyscavengetTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='knightscavengeD'  max="99999"    data-toggle="tooltip"  title="@lang('Control.knighscavengetTitle')" placeholder="@lang('Control.knighs')" class="form-control">

                            		  </div>
                               </div>


                 			</div>



                 			   </div>
						       </div>
                               @if (!$newscvange)
						       <!--  Attack -->
						       <div class="form-group row" >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings ATTACK')</label>

                          <div class="col-sm-9">

                 			  <div class="row"> <!-- Attack -->
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearscavengeA'  max="99999"    data-toggle="tooltip"  title="@lang('Control.spearscavengetTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordscavengeA'  max="99999"    data-toggle="tooltip"  title="@lang('Control.swordscavengetTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axescavengeA'  max="99999"    data-toggle="tooltip"  title="@lang('Control.axescavengetTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerscavengeA'  max="99999"    data-toggle="tooltip"  title="@lang('Control.archerscavengetTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightscavengeA'  max="99999"    data-toggle="tooltip"  title="@lang('Control.lightscavengetTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherscavengeA'  max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherscavengetTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyscavengeA'  max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyscavengetTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='knightscavengeA'  max="99999"    data-toggle="tooltip"  title="@lang('Control.knighscavengetTitle')" placeholder="@lang('Control.knighs')" class="form-control">

                            		  </div>
                               </div>



                 			</div>



                 			   </div>
                               </div><!-- Attack End -->
                               @endif


						       <hr>
						       <!--  Number 2 -->
						       	 @if (!$newscvange)					       <!--  Attack -->
						       <div class="form-group row">
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings ATTACK 2')</label>

                          <div class="col-sm-9">

                 			  <div class="row"> <!-- Attack -->
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearscavengeA2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.spearscavengetTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordscavengeA2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.swordscavengetTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axescavengeA2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.axescavengetTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerscavengeA2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.archerscavengetTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightscavengeA2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.lightscavengetTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherscavengeA2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherscavengetTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyscavengeA2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyscavengetTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='knightscavengeA2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.knighscavengetTitle')" placeholder="@lang('Control.knighs')" class="form-control">

                            		  </div>
                               </div>



                 			</div>
				  			   </div>
						       </div><!-- Attack End -->@endif
						       						       <!--  Defand -->
						       <div class="form-group row">
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings defense 2')</label>

                          <div class="col-sm-9">

                 			  <div class="row"> <!-- Attack -->
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearscavengeD2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.spearscavengetTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordscavengeD2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.swordscavengetTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axescavengeD2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.axescavengetTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerscavengeD2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.archerscavengetTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightscavengeD2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.lightscavengetTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherscavengeD2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherscavengetTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyscavengeD2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyscavengetTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='knightscavengeD2'  max="99999"    data-toggle="tooltip"  title="@lang('Control.knighscavengetTitle')" placeholder="@lang('Control.knighs')" class="form-control">

                            		  </div>
                               </div>



                 			</div>



                 			   </div>
						       </div><!-- Attack End -->
						       <hr>
						       <!--  End Number 2 -->
   						       <!--  Number 3 -->
                                  <!--  Attack -->
                                  @if (!$newscvange)
						       <div class="form-group row">
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings ATTACK 3')</label>

                          <div class="col-sm-9">

                 			  <div class="row"> <!-- Attack -->
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearscavengeA3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.spearscavengetTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordscavengeA3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.swordscavengetTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axescavengeA3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.axescavengetTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerscavengeA3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.archerscavengetTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightscavengeA3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.lightscavengetTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherscavengeA3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherscavengetTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyscavengeA3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyscavengetTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='knightscavengeA3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.knighscavengetTitle')" placeholder="@lang('Control.knighs')" class="form-control">

                            		  </div>
                               </div>



                 			</div>
				  			   </div>
						       </div><!-- Attack End -->@endif
						       						       <!--  Defand -->
						       <div class="form-group row">
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings defense 3')</label>

                          <div class="col-sm-9">

                 			  <div class="row"> <!-- Attack -->
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearscavengeD3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.spearscavengetTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordscavengeD3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.swordscavengetTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axescavengeD3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.axescavengetTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerscavengeD3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.archerscavengetTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightscavengeD3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.lightscavengetTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherscavengeD3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherscavengetTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyscavengeD3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyscavengetTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='knightscavengeD3'  max="99999"    data-toggle="tooltip"  title="@lang('Control.knighscavengetTitle')" placeholder="@lang('Control.knighs')" class="form-control">

                            		  </div>
                               </div>



                 			</div>



                 			   </div>
						       </div><!-- Attack End -->
						       <hr>
						       <!--  End Number 3 -->
						       <!--  Number 4 -->
   						       <!--  Attack -->@if (!$newscvange)
						       <div class="form-group row">
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings ATTACK 4')</label>

                          <div class="col-sm-9">

                 			  <div class="row"> <!-- Attack -->
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearscavengeA4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.spearscavengetTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordscavengeA4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.swordscavengetTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axescavengeA4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.axescavengetTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerscavengeA4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.archerscavengetTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightscavengeA4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.lightscavengetTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherscavengeA4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherscavengetTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyscavengeA4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyscavengetTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='knightscavengeA4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.knighscavengetTitle')" placeholder="@lang('Control.knighs')" class="form-control">

                            		  </div>
                               </div>



                 			</div>
				  			   </div>
						       </div><!-- Attack End -->@endif
						       						       <!--  Defand -->
						       <div class="form-group row">
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings defense 4')</label>

                          <div class="col-sm-9">

                 			  <div class="row"> <!-- Attack -->
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearscavengeD4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.spearscavengetTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordscavengeD4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.swordscavengetTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axescavengeD4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.axescavengetTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerscavengeD4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.archerscavengetTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightscavengeD4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.lightscavengetTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherscavengeD4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherscavengetTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyscavengeD4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyscavengetTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-2" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='knightscavengeD4'  max="99999"    data-toggle="tooltip"  title="@lang('Control.knighscavengetTitle')" placeholder="@lang('Control.knighs')" class="form-control">

                            		  </div>
                               </div>



                 			</div>



                 			   </div>
						       </div><!-- Attack End -->

						       <hr>
						       <!--  End Number 4 -->
                              </div> @endif</div>

                 <!--     End scavenge -->


                      <!-- Start SendResourceViliges  -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " data-id="8form"  @if ($SendResourceViligesRun) style="
                  color: green;
              " @endif  onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.SendResourceViliges')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("SendResourceViliges") )
                <div style="display: none;" id='8form' >
                  <div class="form-group col-md-3 ">
                            <input type="checkbox" id='SendResourceViligesRun' @if($SendResourceViligesRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div>
                  <div class="form-group row" >

                  <h1></h1>


                          <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

                          <div class="col-sm-9">
                            <div class="row">

                       	 <div class="input-group">

                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/rechts.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='maxstepsendtoviligRes'  max="99999"    data-toggle="tooltip"  title="@lang('Control.maxstepsendtoviligResTitle')" placeholder="@lang('Control.maxstepsendtoviligRes')" class="form-control">

                            		  </div>

                            		   <div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon">568|513
                                 			 </div>
                               			</div>
                               			 <input type="text" min="0"  id ='ViligXY'  max="99999"    data-toggle="tooltip"  title="@lang('Control.ViligXYTitle')" placeholder="@lang('Control.ViligXY')" class="form-control">

                            		  </div>
                              		   <div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon">ResMAX
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='MaxResSend'  max="99999"    data-toggle="tooltip"  title="@lang('Control.MaxResSendTitle')" placeholder="@lang('Control.MaxResSend')" class="form-control">

                            		  </div>

                               </div>


                 			  	 <div class="form-group col-md-9 col-sm-9">

                            </div>
                           <div class="form-group col-md-2  col-sm-3  ">
                          <input type="button"  onclick="AddTofileSendResourceViligesVilges({{$world->id}})" value="Add" class="form-control  btn-primary btn ">
                          </div>

                 			</div>

                 			<!-- Tab -->
                 		<table class="table ">
                          <thead>
                            <tr>
                              <th>@lang('Control.ViligXY')</th>
                                <th>@lang('Control.maxstepsendtoviligRes')</th>
                                <th>@lang('Control.MaxResSend')</th>

                              <th>@lang('Control.Event')</th>
                            </tr>
                          </thead>
                          <tbody id="DateAllSendResourceViligesVilges{{$world->id}}">
                          <!-- Data-->



                          </tbody>
                        </table>


                 			<!--  Tab -->
                 			   </div>
						       </div>@endif</div>


                 <!--     End  SendResourceViliges   -->
                   <!-- Start NewBarbarAttacks           -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " data-id="10form"  @if ($NewBarbarAttackRun) style="
                  color: green;
              " @endif  onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.NewBarbarAttack')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("NewBarbarAttack") )
                  <div class="form-group row" style="display: none;" id='10form'>
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.OnOff')</label>
                          <div class="col-sm-9">
                            <div class="row">

                            <input type="checkbox" id='NewBarbarAttackRun' name="NewBarbarAttackRun" @if($NewBarbarAttackRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div>
                 			   </div>

                 			   <div class="col-md-3">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="NewBarbarAttackzMaxStep"><img src="/img/rechts.png" height="16" width="16">
                                 			 </div>
                               			</div>
                         			  <input type="number" min="0" value="{{$NewBarbarAttackMaxStep}}" id="NewBarbarAttackMaxStep"  max="99999" data-placement="bottom" data-toggle="tooltip" title="" placeholder="@lang('Control.stepMAXB')" class="form-control" data-original-title="@lang('Control.stepMAXtitleB')">
                            		  </div>
                               </div>

						       </div>@endif




                </div>

                 <!--     End NewBarbarAttacks  -->

                    <!-- Start smashingwalls           -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  "  data-id="11form"  @if ($smashingwallsRun) style="
                  color: green;
              " @endif onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.smashingwalls')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("smashingwalls") )
                  <div class="form-group row" style="display: none;" id='11form'>
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.OnOff')</label>
                          <div class="col-sm-9">
                            <div class="row">

                            <input type="checkbox" id='smashingwallsRun' name="smashingwallsRun" @if($smashingwallsRun) checked @endif value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div>
                 			   </div>

                 			   <div class="col-md-3">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="smashingwallszMaxStep"><img src="/img/rechts.png" height="16" width="16">
                                 			 </div>
                               			</div>
                         			  <input type="number" min="0" value="{{$smashingwallsMaxStep}}" id="smashingwallsMaxStep"  max="99999" data-placement="bottom" data-toggle="tooltip" title="" placeholder="@lang('Control.stepMAXS')" class="form-control" data-original-title="@lang('Control.stepMAXtitleS')">
                            		  </div>

                                <div class="input-group">
                                       <div class="input-group-prepend">
                                          <div class="input-group-text" id="smashingwallsMark">?=<img src="/img/wall.png" height="16" width="16">
                                          </div>
                                       </div>
                                   <input type="number" min="-1" value="{{$smashingwallsMark}}" id="smashingwallsMark"  max="20" data-placement="bottom" data-toggle="tooltip" title="" placeholder="@lang('Control.makrMAXS')" class="form-control" data-original-title="@lang('Control.makrtitleS')">
                                  </div>
                           </div>

						       </div>
                        @endif



                </div>

                 <!--     End smashingwalls  -->

                     <!-- Start MakeArrmy           -->
                  <!--MakeArrmyHtml HTML1 scrp1 scrp2 scrp3      -->
                   <div class = 'card-body' >
				  <hr>@if ( \App\RunBots\PermationUser::checkup("MakeArrmy") || \App\RunBots\PermationUser::checkup("MakeArrmyNoPur") )
				   <div class="h4 red  "  id='MakeArrmyformworld'  data-id="MakeArrmyform"   onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.MakeArrmy')</div>
								<hr>

                <div style="display: none;" id='MakeArrmyform' >
                  <div class="form-group col-md-3 ">
                            <input type="checkbox" id='MakeArrmyRun' value='0' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div>
                            <div @if($world->run)  style="display: none;" @endif id="hidearrmynonPro{{$world->id}}" class="form-group row" >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.SettingsNonPro')</label>
                          <div class="col-sm-9">
                            <div class="row">




                 			   <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spearMakeArrmy' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.spearMakeArrmyTitle')" placeholder="@lang('Control.spears')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
                                 			 </div>
                               			</div>
                               			<!-- $sword
                               			$axe = 10;
                                        $light = 80;
                                        $heavy = 50;
                                        $knight = 100; -->
                               			 <input type="number" min="0"  id ='swordMakeArrmy' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.swordMakeArrmyTitle')" placeholder="@lang('Control.swords')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='axeMakeArrmy' value=0  max="99999"    data-toggle="tooltip"  title="@lang('Control.axeMakeArrmyTitle')" placeholder="@lang('Control.axes')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='archerMakeArrmy' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.archerMakeArrmyTitle')" placeholder="@lang('Control.archers')" class="form-control">

                            		  </div>
                               </div>

                 			   <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='lightMakeArrmy' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.lightMakeArrmyTitle')" placeholder="@lang('Control.lights')" class="form-control">

                            		  </div>
                               </div>
                                <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spy.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='spyMakeArrmy' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.spyMakeArrmyTitle')" placeholder="@lang('Control.spys')" class="form-control">

                            		  </div>
                               </div>
                               <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='marcherMakeArrmy' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherMakeArrmyTitle')" placeholder="@lang('Control.marchers')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='heavyMakeArrmy' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyMakeArrmyTitle')" placeholder="@lang('Control.heavys')" class="form-control">

                            		  </div>
                               </div>
								  <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_ram.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0" value=0 id ='ramMakeArrmy'  max="99999"    data-toggle="tooltip"  title="@lang('Control.ramMakeArrmyTitle')" placeholder="@lang('Control.rams')" class="form-control">

                            		  </div>
                               </div>
                                 <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_catapult.png">
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0" value=0 id ='catapultMakeArrmy'  max="99999"    data-toggle="tooltip"  title="@lang('Control.catapultMakeArrmyTitle')" placeholder="@lang('Control.catapults')" class="form-control">

                            		  </div>
                               </div>
                 			   <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/resou.png" >%
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0" value=25 id ='MinStarogMakeArrmy'  max="100"    data-toggle="tooltip"  title="@lang('Control.MinFromAllMakeArrmyTitle')" placeholder="@lang('Control.MinFromAll')" class="form-control">

                            		  </div>
                         </div>







                            </div>

                 			</div>
                 			<!-- Tab -->

                 			<!--  Tab -->
													</div>


													<div @if($world->runnopro)  style="display: none;" @endif    id="hidearrmyPro{{$world->id}}"  class="form-group row" >
														<h1></h1>
																		<label class="col-sm-3 form-control-label">@lang('Control.SettingsPro')</label>
																		<div class="col-sm-9">
																			<div class="row">



																				<div class="col-md-3" style="min-width: 194px;">
																					<div class="input-group">
																								<select  name="lstStates"   title="@lang('Control.SelectGrupeTitel')"   data-toggle="tooltip"  multiple data-live-search="true" data-max-options="3" id="idviligeMakeArrmy">
																										@if ($Groups!= null)

																									@foreach ($Groups[0] as $name )
																									<?php $setoption = false;?>
																										@foreach($MakeArrmylist as $list)
																										@if ($list==$name->id)
																										<?php $setoption = true;break;?>
																										@endif
																										@endforeach
																										 <option value='{{$name->id}}' @if($setoption) selected @endif >{{$name->name}} </option>

																									@endforeach
																									 @endif
																								</select>

																						</div>
																	 			 </div>






																			</div>

																 </div>
																 <!-- Tab -->

																 <!--  Tab -->
																		</div>

						       </div>@endif</div>
                  @yield('MakeArrmyHtml')
                                        <!-- end MakeArrmy           -->
                <!-- Start MarketBuyResourser           -->
                 @include('bots.MarketBuyResourser.HtmlHead')
				  @if ( \App\RunBots\PermationUser::checkup("MarketBuyResourser"))
                     <!-- Start MarketBuyResourserRun      -->
                   @include('bots.MarketBuyResourser.Html')
                   @endif
                </div>
                   <!-- Start MarketSellResourser           -->
                   @include('bots.MarketSellResourser.HtmlHead')
                   @if ( \App\RunBots\PermationUser::checkup("MarketSellResourser"))

                    @include('bots.MarketSellResourser.Html')
                    @endif
                </div>
								<!-- Start FakeAttack           -->
								<div class = 'card-body' >
								<hr> <div class="h4 red  " id="FakeAttackformworld" data-id="FakeAttackform"   onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.FakeAttack')</div>
								<hr>

								@if ( \App\RunBots\PermationUser::checkup("FakeAttaks") )
                <div style="display: none;" id='FakeAttackform' >
                  <div class="form-group col-md-3 ">
                            <input type="checkbox" id='FakeAttackRun' value='0' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div>
                  <div class="form-group row" >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>
                          <div class="col-sm-9">
                            <div class="row">

															<div class="container">
																<div class="row">
																		<div class="col-sm-6">
																				<div class="form-group">
																					<div class="input-group date datetimepickerx" id="datetimepicker{{$world->id}}" data-target-input="nearest">
																									<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker{{$world->id}}"/>
																									<div class="input-group-append" data-target="#datetimepicker{{$world->id}}" data-toggle="datetimepicker">
																											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
																									</div>
																					</div>
																				</div>
																		</div>

																</div>
														</div>


															 <!-- $ram
														 <div class="col-md-3" style="min-width: 194px;">
															<div class="input-group">
																 <div class="input-group-prepend">
																		<div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_ram.png" >
																		</div>
																 </div>

																 <input type="checkbox" id='FakeAttackRun' value='0' data-toggle="toggle" data-on="Run" data-off="Off">
															</div>
													 </div>
													 	-->


                 			   <div class="col-md-3" style="min-width: 194px;">
                                	<div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spy.png" >
                                 			 </div>
                               			</div>
                               			<!-- $spear -->
                               			 <input type="number" min="0"  id ='spyFakeAttack' value='1' max="99999"    data-toggle="tooltip"  title="@lang('control.spyFakeAttackTitle')" placeholder="@lang('control.spyFakeAttack')" class="form-control">

                            		  </div>
													 </div>

													 <div class="col-md-3" style="min-width: 194px;">
														<div class="input-group">
																	<select  name="lstStates"   title="@lang('Control.SelectGrupeTitel')"   data-toggle="tooltip"  multiple data-live-search="true" data-max-options="1" id="idviligeFakeAttack">
																			@if ($Groups!= null)

																		@foreach ($Groups[0] as $name )
																		<?php $setoption = false;?>
																			@foreach($FakeAttacklist as $list)
																			@if ($list==$name->id)
																			<?php $setoption = true;break;?>
																			@endif
																			@endforeach

																			 <option value='{{$name->id}}' @if($setoption) selected @endif >{{$name->name}} </option>

																		@endforeach
																		 @endif
																	</select>

															</div>
														</div>


											 <div class="form-group col-md-3 ">
													<input type="button"  onclick="clac({{$world->id}} ,this)" id="Clac" value="@lang('Control.Calc')" class="form-control  btn-primary btn ">
																	</div>

											<div class="form-group col-md-3 ">
													<input type="button"  onclick="openadd({{$world->id}} ,this)"  value="@lang('Control.Add')" class="form-control  btn-primary btn ">
																	</div>

													 <div class="col-md-12"  >
															<div class="input-group">
																	<label for="FakeAttackVi">@lang('Control.viliges')</label>
																 <!-- $spear -->
																 <textarea class="form-control" rows="10" id="FakeAttackVi"></textarea>
															</div>
											     </div>

                          </div>
                 			<!-- Tab -->

                 			<!--  Tab -->
													</div>

													<!-- Tablstart -->
													<div class ="table-responsive">
													<table class="table">
														<thead>
															<tr>
																<th scope="col">@lang("Control.CountAttacK")</th>
																<th scope="col">@lang("Control.SpyCount")</th>
																<th scope="col">@lang("Control.ViligesFrom")</th>
																<th scope="col">@lang("Control.ViligesTo")</th>
																<th scope="col">@lang("Control.TimeAttack")</th>
																<th scope="col">@lang("Control.TimeArrive")</th>
																<th scope="col">@lang("Control.edit")</th>
																<th scope="col">@lang("Control.Events")</th>
															</tr>
														</thead><br>
														<tbody id="DateAllFakeAttakVilges{{$world->id}}">
															<!-- data -->



														</tbody>
													</table>
												</div>
													<!-- TablEnd -->
									 </div>


									</div>@endif
								</div> 	<!-- end FakeAttack      ثقلثقلثىاثا     -->
							@if ( \App\RunBots\PermationUser::checkup("SendAttakByTime") )
							<script> var TypeSendAttakByTime=[
								//"send_sniper_my_support",
								"send_sniper_support",
								"send_snob_attack",
								"send_ram_cleaning_attack",
								"send_anti_sniper_attack"];
								var TypeSendAttakByTimelang=[
								//"send_sniper_my_support",
								"@lang("Control.send_sniper_support")",
								"@lang("Control.send_snob_attack")",
								"@lang("Control.send_ram_cleaning_attack")",
								"@lang("Control.send_anti_sniper_attack")"];
								var e=""; for (let index = 0; index < TypeSendAttakByTime.length; index++) {
							 e += `
															<!-- Start ${TypeSendAttakByTime[index]}-->

																<div class = 'card-body' >
																	<hr> <div class="h4 red  " id="${TypeSendAttakByTime[index]}world"  data-id="${TypeSendAttakByTime[index]}form"   onclick = 'hideshow(this,{{$world->id}})' > ${TypeSendAttakByTimelang[index]}</div>
																	<hr>


													<div style="display: none;" id='${TypeSendAttakByTime[index]}form' >
													  <div class="form-group col-md-3 ">
													  <input type="checkbox" id='${TypeSendAttakByTime[index]}Run' value='0' data-toggle="toggle" data-on="Run" data-off="Off">
																   </div>
													  <div class="form-group row" >
													  <h1></h1>
															  <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>
															  <div class="col-sm-9">
																<div class="row">
																				<div class="form-group col-md-3 ">
																						<input type="button"  onclick="openaddSendAttack({{$world->id}} ,this ,'${TypeSendAttakByTime[index]}')"  value="@lang('Control.Add')" class="form-control  btn-primary btn ">
																										</div>


															  </div>
																						</div>

																						<!-- Tablstart -->
																						<div class ="table-responsive">
																						<table class="table">
																							<thead>
																								<tr>
																									<th scope="col">@lang("Control.CountAttacK")</th>
																									<th scope="col">@lang("Control.troops")</th>
																									<th scope="col">@lang("Control.ViligesFrom")</th>
																									<th scope="col">@lang("Control.ViligesTo")</th>
																									<th scope="col">@lang("Control.TimeAttack")</th>
																									<th scope="col">@lang("Control.TimeArrive")</th>
																									<!--<th scope="col">@lang("Control.edit")</th>-->
																									<th scope="col">@lang("Control.Events")</th>
																								</tr>
																							</thead><br>
																							<tbody id="${TypeSendAttakByTime[index]}{{$world->id}}">
																								<!-- data -->



																							</tbody>
																						</table>
																					</div>
																						<!-- TablEnd -->
																		 </div>


																		</div>
																	</div>
																	<!-- end ${TypeSendAttakByTime[index]}           -->  	`;

																}
																document.write( e );
										</script>

									@endif
									@if ( \App\RunBots\PermationUser::checkup("ThifHelperPlayers") )
									<!-- end FakeAttack      ثقلثقلثىاثا     -->
																	<!-- Start SendAttakByTime-->
																		<div class = 'card-body' >
																			<hr> <div class="h4 red  " id="ThifHelperPlayersworld" data-id="ThifHelperPlayersform"   onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.ThifHelperPlayers')</div>
																			<hr>


															<div style="display: none;" id='ThifHelperPlayersform' >
															  <div class="form-group col-md-3 ">
															  <input type="checkbox" id='ThifHelperPlayersRun' data-toggle="toggle" data-on="Run" data-off="Off">
																		   </div>
															  <div class="form-group row" >
															  <h1></h1>

																	  <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

																	  <div class="col-sm-9">
																			<div class="form-group col-md-9 col-sm-9">
																					<select id='idviligeThifHelperPlayers' class="form-control">
																					@if ($Viligname!= null)
																				   @foreach ($Viligname as $name )
																					   @if (isset($name->name))
																					  <option value='{{$name->id}}'>{{$name->name}}</option>
																						  @endif

																					  @endforeach
																					  @endif
																					</select>
																					</div>
																		<div class="row">

																			<div class="col-sm-9">
																					<div class="row">




																						<div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
																									  </div>
																								   </div>
																								   <!-- $spear -->
																									<input type="number" min="0"  id ='spearThifHelperPlayers' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.spearThifHelperPlayersTitle')" placeholder="@lang('Control.spears')" class="form-control">

																							  </div>
																					   </div>
																						<div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
																									  </div>
																								   </div>
																								   <!-- $sword
																								   $axe = 10;
																								$light = 80;
																								$heavy = 50;
																								$knight = 100; -->
																									<input type="number" min="0"  id ='swordThifHelperPlayers' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.swordThifHelperPlayersTitle')" placeholder="@lang('Control.swords')" class="form-control">

																							  </div>
																					   </div>
																						<div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
																									  </div>
																								   </div>
																									<input type="number" min="0"  id ='axeThifHelperPlayers' value=0  max="99999"    data-toggle="tooltip"  title="@lang('Control.axeThifHelperPlayersTitle')" placeholder="@lang('Control.axes')" class="form-control">

																							  </div>
																					   </div>
																					   <div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
																									  </div>
																								   </div>
																									<input type="number" min="0"  id ='archerThifHelperPlayers' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.archerThifHelperPlayersTitle')" placeholder="@lang('Control.archers')" class="form-control">

																							  </div>
																					   </div>

																						<div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
																									  </div>
																								   </div>
																									<input type="number" min="0"  id ='lightThifHelperPlayers' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.lightThifHelperPlayersTitle')" placeholder="@lang('Control.lights')" class="form-control">

																							  </div>
																					   </div>
																						<div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spy.png" >
																									  </div>
																								   </div>
																									<input type="number" min="0"  id ='spyThifHelperPlayers' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.spyThifHelperPlayersTitle')" placeholder="@lang('Control.spys')" class="form-control">

																							  </div>
																					   </div>
																					   <div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
																									  </div>
																								   </div>
																									<input type="number" min="0"  id ='marcherThifHelperPlayers' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherThifHelperPlayersTitle')" placeholder="@lang('Control.marchers')" class="form-control">

																							  </div>
																					   </div>
																						<div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
																									  </div>
																								   </div>
																									<input type="number" min="0"  id ='heavyThifHelperPlayers' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.heavyThifHelperPlayersTitle')" placeholder="@lang('Control.heavys')" class="form-control">

																							  </div>
																					   </div>
																						  <div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_ram.png">
																									  </div>
																								   </div>
																									<input type="number" min="0" value=0 id ='ramThifHelperPlayers'  max="99999"    data-toggle="tooltip"  title="@lang('Control.ramThifHelperPlayersTitle')" placeholder="@lang('Control.rams')" class="form-control">

																							  </div>
																					   </div>
																						 <div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_catapult.png">
																									  </div>
																								   </div>
																									<input type="number" min="0" value=0 id ='catapultThifHelperPlayers'  max="99999"    data-toggle="tooltip"  title="@lang('Control.catapultThifHelperPlayersTitle')" placeholder="@lang('Control.catapults')" class="form-control">

																							  </div>
																					   </div>
																					   <div class="col-md-3" style="min-width: 194px;">
																						<div class="input-group">
																							   <div class="input-group-prepend">
																								  <div class="input-group-text" id="btnGroupAddon"><img src="/img/rechts.png">
																								  </div>
																							   </div>
																								<input type="number" min="0" value=0 id ='maxstepThifHelperPlayers'  max="99999"    data-toggle="tooltip"  title="@lang('Control.maxstepThifHelperPlayersTitle')" placeholder="@lang('Control.maxstep')" class="form-control">

																						  </div>
																						</div>
																						<div class="col-md-3" style="min-width: 194px;">
																							<div class="input-group">
																								   <div class="input-group-prepend">
																									  <div class="input-group-text" id="btnGroupAddon"><img src="/img/account.png">
																									  </div>
																								   </div>
																									<input type="number" min="0" value=0 id ='PlayerMaxPorintsThifHelperPlayers'  max="99999"    data-toggle="tooltip"  title="@lang('Control.PlayerMaxPorintsThifHelperPlayersTitle')" placeholder="@lang('Control.PlayerMaxPorints')" class="form-control">

																							  </div>
                                                                                        </div>
                                                                                        <div class="col-md-3" style="min-width: 194px;">
                                                                                            <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <div class="input-group-text" id="btnGroupAddon"><i class="fa fa-clock-o" style="font-size:23px"></i>
                                                                                                        </div>
                                                                                                                <div class="input-group bootstrap-timepicker timepicker">
                                                                                                                    <input  id="MaxWaitForNextListThifHelperPlayers" name='MaxWaitForNextListThifHelperPlayers'  value="1:00:00" type="text" class="form-control input-small formales5565"  data-toggle="tooltip"  title="@lang('Control.TimeMaxtitle')"  class="form-control" >
                                                                                                                    </div>
                                                                                                    </div>
                                                                                            </div>
                                                                                        </div>
																					</div>

																					 </div>

                                                                      </div>
                                                                      <div class="col-sm-9">
                                                                        <div class="row">

                                                                      <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                           <div class="input-group-text" id="btnGroupAddon">568|513
                                                                           </div>
                                                                        </div>
                                                                         <input type="text" id ='ViligXYThif' data-toggle="tooltip"  title="@lang('Control.ViligXYTitle')" placeholder="@lang('Control.ViligXY')" class="form-control">
                                                                         <input type="button"  onclick="AddTofilethifhelprViligesVilges({{$world->id}})"  value="@lang('Control.Add')" class="form-control  btn-primary btn ">
                                                                                </div>
                                                                                </div>
                                                                            </div>
																		 <!-- Tab -->

																		 <!--  Tab -->
																								</div>


                            <!-- Tablstart -->
                            <div class ="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">@lang("Control.Vilige")</th>
                                            <th scope="col">@lang("Control.Events")</th>
                                        </tr>
                                    </thead><br>
                                    <tbody id="DateAllThifHelper{{$world->id}}">
                                        <!-- data -->



                                    </tbody>
                                </table>
                            </div>
                                <!-- TablEnd -->

																				 </div>


																				</div>
																			</div>
																			<!-- end ThifHelperPlayers           -->
											@endif



                <!-- Start Set Exception Villages  SetException  -->
               <div class = 'card-body' >

                  <hr> <div class="h4 red  " data-id="9form" id="SetExceptionVillagesworld"   onclick = 'hideshow(this,{{$world->id}})' > @lang('Control.SetExceptionVillages')</div>
				<hr>
				@if ( \App\RunBots\PermationUser::checkup("SetExceptionVillages") )
                  <div class="form-group row" style="display: none;" id='9form' >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('Control.Settings')</label>

                          <div class="col-sm-9">

                 			  <div class="row">

                 			  	 <div class="form-group col-md-9 col-sm-9">
                            <select id='namevileg5' class="form-control">
                            @if ($Viligname!= null)
                           @foreach ($Viligname as $name )
                          	 @if (isset($name->name))
                              <option value='{{$name->id}}'>{{$name->name}}</option>
                     			 @endif

                              @endforeach
                              @endif
                            </select>
                            </div>
                           <div class="form-group col-md-2  col-sm-3  ">
                          <input type="button"  onclick="AddTofileSetExceptionVilges({{$world->id}})" value="Add" class="form-control  btn-primary btn ">
                          </div>

                 			</div>

                 			<!-- Tab -->
                 		<table class="table ">
                          <thead>
                            <tr>
                              <th>@lang('Control.village')</th>
                                <th>@lang('Control.Count')</th>
                              <th>@lang('Control.Event')</th>
                            </tr>
                          </thead>
                          <tbody id="DateAllSetExceptionVilges{{$world->id}}">
                          <!-- Data-->



                          </tbody>
                        </table>


                 			<!--  Tab -->
                 			   </div>
						       </div>@endif
          				     </div>

                 <!--     End set Exption Viliges -->


                 </form>
                </div>





				<!-- StartShow FakeAttakAdd -->
		<div id="myModalFakeAttakAdd{{$world->id}}" class="modal fade">
			<div class="modal-dialog">
		  <div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">@lang('Control.Add Vili')</h4>
			  <button type="button" class="close" data-dismiss="modal">×</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">

		 <table class="table table-borderless">
		 <thead>
		  <tr>
			<th>@lang('Control.settings') </th>
			<th>@lang('Control.data')</th>
		  </tr>
		</thead>
			<tbody>



		  <tr>
		   <td>  <label for="Status">@lang('Control.CountAttacK')</label>  </td>
			<td> <input type="number" min="1"  id ='CountAttacKAdd{{$world->id}}' onchange="EditCountfakeAttaker(this)"  max="4" data-toggle="tooltip"  title="@lang('Control.CountAttacK')" placeholder="@lang('Control.CountAttacK')" class="form-control"></td>
		  </tr>

		 	 <tr>
				<td>  <label for="Status">@lang('Control.Vilige')</label>  </td>
				<td>
			<div class="col-md-3" style="min-width: 194px;">
					<div class="input-group">

							<select  name="lstStates"   title="@lang('Control.Vilige')"   data-toggle="tooltip"  multiple data-live-search="true" data-max-options="1" id="idOneVilgeFakeAttack{{$world->id}}">
						@if ($Viligname!= null)
                           @foreach ($Viligname as $name )
                          	 @if (isset($name->name))
                              <option value='{{$name->id}}'>{{$name->name}}</option>
                     			 @endif

                              @endforeach
                              @endif
							</select>

					</div>
				</div>
				</td>
			</tr>

			<tr>
					<td>  <label for="Status">@lang('Control.viligeXY')</label>  </td>
					 <td> <input type="text"  id ='textviligeAddF{{$world->id}}'  data-toggle="tooltip"  title="@lang('Control.textviligeAddF')" placeholder="@lang('Control.textviligeAddF')" class="form-control"></td>
			</tr>

		  <tr>
				<td>  <label for="Status">@lang('Control.SpyCount')</label>  </td>
				 <td> <input type="number" min="0"  id ='SpyCountAdd{{$world->id}}'  onchange="EditspyfakeAttaker(this)" max="100000" data-toggle="tooltip"  title="@lang('Control.SpyCount')" placeholder="@lang('Control.SpyCount')" class="form-control"></td>
		 </tr>

		 <tr>
		   <td><label for="Status">@lang('Control.TimeArrive')</label></td>
			<td>
					<div class="input-group date datetimepickerx" id="datetimepickerTimeArriveA{{$world->id}}" data-target-input="nearest">
							<input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerTimeArriveA{{$world->id}}"/>
							<div class="input-group-append" data-target="#datetimepickerTimeArriveA{{$world->id}}" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
							</div>
					</div>

			</td>
		 </tr>


			  </tbody>
			  </table>

			  </div>

			<!-- Modal footer -->
			<div class="modal-footer">
			   <button type="button"  onclick="clacAdd(this , {{$world->id}} )"  class="btn btn-success" >@lang('Control.save')</button>
			  <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal">@lang('Control.Close')</button>
			</div>



		  </div>
		</div>
	  </div>
					<!-- End Show Deglio FakeAttakEdit -->








				@endforeach
				@if ( \App\RunBots\PermationUser::checkup("SendAttakByTime") )
				<!-- StartShow SendAttakByTime -->
				<div id="myModalSendAttakByTimeAdd" class="modal fade">
						<div class="modal-dialog">
					  <div class="modal-content">

						<!-- Modal Header -->
						<div class="modal-header">
						  <h4 class="modal-title">@lang('Control.Add Vili')</h4>
						  <button type="button" class="close" data-dismiss="modal">×</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">

					 <table class="table table-borderless">
					 <thead>
					  <tr>
						<th>@lang('Control.settings') </th>
						<th>@lang('Control.data')</th>
					  </tr>
					</thead>
						<tbody>



					  <tr>
					   <td>  <label for="Status">@lang('Control.CountAttackSendAttakByTime')</label>  </td>
						<td> <input type="number" min="1"  id ='CountAttackSendAttakByTime' onchange="EditCountSendAttakByTime(this)"  max="4" data-toggle="tooltip"  title="@lang('Control.CountAttacK')" placeholder="@lang('Control.CountAttacK')" class="form-control"></td>
					  </tr>

						  <tr>
							<td>  <label for="Status">@lang('Control.Vilige')</label>  </td>
							<td>
						<div class="col-md-3" style="min-width: 194px;">
								<div class="input-group">

										<select  name="lstStates"   title="@lang('Control.Vilige')"   data-toggle="tooltip"  multiple data-live-search="true" data-max-options="1" id="idOneVilgeSendAttakByTime">
										 @if ($Viligname!= null)
										 @foreach ($Viligname as $name )
											 @if (isset($name->name))
											<option value='{{$name->id}}'>{{$name->name}}</option>
												@endif

											@endforeach
											@endif
										</select>


								</div>
							</div>
							</td>
						</tr>

						<tr>
								<td>  <label for="Status">@lang('Control.viligeXY')</label>  </td>
								 <td> <input type="text"  id ='textviligeAddF'  data-toggle="tooltip"  title="@lang('Control.textviligeAddF')" placeholder="@lang('Control.textviligeAddF')" class="form-control"></td>
                        </tr>

                        <tr  id="staicofnbils_show" style="min-width: 194px; display: none;">
                            <td>  <label for="Status">@lang('Control.StaticTemp')</label>
                            </td>
                                <td>
                                <div class="input-group">

                                    <input type="checkbox" id="staicofnbils"  name="staicofnbils" data-onstyle="danger"  data-toggle="toggle" data-on="Static" data-off="Auto" data-width= '120px'>

                                </div>
                                </td>
                        </tr>

					  <tr>
							<td>  <label for="Status">@lang('Control.Troops')</label>  </td>
							 <td>

									<div class="col-sm-9">
											<div class="row">
												<div  id="spearSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spear.png" >
															  </div>
														   </div>
														   <!-- $spear -->
															<input type="number" min="0"  id ='spearSendAttakByTime' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.spearSendAttakByTimeTitle')" placeholder="@lang('Control.spears')" class="form-control">

													  </div>
                                               </div>



												<div id="swordSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_sword.png" >
															  </div>
														   </div>
													<!---	$sword
														   $axe = 10;
														$light = 80;
														$heavy = 50;
														$knight = 100;  -->
															<input type="number" min="0"  id ='swordSendAttakByTime' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.swordSendAttakByTimeTitle')" placeholder="@lang('Control.swords')" class="form-control">

													  </div>
											   </div>
												<div id="axeSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_axe.png" >
															  </div>
														   </div>
															<input type="number" min="0"  id ='axeSendAttakByTime' value=0  max="99999"    data-toggle="tooltip"  title="@lang('Control.axeSendAttakByTimeTitle')" placeholder="@lang('Control.axes')" class="form-control">

													  </div>
											   </div>
											   <div id="archerSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_archer.png" >
															  </div>
														   </div>
															<input type="number" min="0"  id ='archerSendAttakByTime' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.archerSendAttakByTimeTitle')" placeholder="@lang('Control.archers')" class="form-control">

													  </div>
											   </div>

												<div id="lightSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_light.png" >
															  </div>
														   </div>
															<input type="number" min="0"  id ='lightSendAttakByTime' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.lightSendAttakByTimeTitle')" placeholder="@lang('Control.lights')" class="form-control">

													  </div>
											   </div>
												<div id="spySendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_spy.png" >
															  </div>
														   </div>
															<input type="number" min="0"  id ='spySendAttakByTime' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.spySendAttakByTimeTitle')" placeholder="@lang('Control.spys')" class="form-control">

													  </div>
											   </div>
											   <div id="marcherSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_marcher.png" >
															  </div>
														   </div>
															<input type="number" min="0"  id ='marcherSendAttakByTime' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.marcherSendAttakByTimeTitle')" placeholder="@lang('Control.marchers')" class="form-control">

													  </div>
											   </div>
												<div id="heavySendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_heavy.png">
															  </div>
														   </div>
															<input type="number" min="0"  id ='heavySendAttakByTime' value=0 max="99999"    data-toggle="tooltip"  title="@lang('Control.heavySendAttakByTimeTitle')" placeholder="@lang('Control.heavys')" class="form-control">

													  </div>
											   </div>
											   <div id="knightSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
												<div class="input-group">
													   <div class="input-group-prepend">
														  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_knight.png">
														  </div>
													   </div>
														<input type="number" min="0" value=0 id ='knightSendAttakByTime'  max="99999"    data-toggle="tooltip"  title="@lang('Control.ramSendAttakByTimeTitle')" placeholder="@lang('Control.rams')" class="form-control">

												  </div>
										  	 </div>
												  <div id="ramSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_ram.png">
															  </div>
														   </div>
															<input type="number" min="0" value=0 id ='ramSendAttakByTime'  max="99999"    data-toggle="tooltip"  title="@lang('Control.ramSendAttakByTimeTitle')" placeholder="@lang('Control.rams')" class="form-control">

													  </div>
											   </div>
												 <div id="catapultSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_catapult.png">
															  </div>
														   </div>
															<input type="number" min="0" value=0 id ='catapultSendAttakByTime'  max="99999"    data-toggle="tooltip"  title="@lang('Control.catapultSendAttakByTimeTitle')" placeholder="@lang('Control.catapults')" class="form-control">

													  </div>
											   </div>
												<div id="SnobSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
													<div class="input-group">
														   <div class="input-group-prepend">
															  <div class="input-group-text" id="btnGroupAddon"><img src="/img/unit_snob.png" >
															  </div>
														   </div>
															<input type="number" min="0" id ='SnobSendAttakByTime'  value=0  max="99999"    data-toggle="tooltip"  title="@lang('Control.SnobSendAttakByTimeTitle')" placeholder="@lang('Control.snob')" class="form-control">

													</div>
												</div>

											<div id="SupportFromTroSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
												<div class="input-group">
													   <div class="input-group-prepend">
														  <div class="input-group-text" id="btnGroupAddon"><img height="18" width="18" src="/img/3004.png">
														  </div>
													   </div>
														<input type="number" min="0" value=0 id ='SupportFromTroSendAttakByTime'  max="99999"    data-toggle="tooltip"  title="@lang('Control.SupportFromTroSendAttakByTimeTitle')" placeholder="@lang('Control.SupportFromTroSendAttakByTime')" class="form-control">

												  </div>
											   </div>
											   <div id="SupportFromPlayerSendAttakByTime_show" class="col-md-3" style="min-width: 194px; display: none;">
												<div class="input-group">
													   <div class="input-group-prepend">
														  <div class="input-group-text" id="btnGroupAddon"><img height="18" width="18" src="/img/3005.png">
														  </div>
													   </div>
														<input type="number" min="0" value=0 id ='SupportFromPlayerSendAttakByTime'  max="99999"    data-toggle="tooltip"  title="@lang('Control.SupportFromPlayerSendAttakByTimeTitle')" placeholder="@lang('Control.SupportFromPlayerSendAttakByTime')" class="form-control">

												  </div>
										   		</div>
											 </div>
										</div>
							</td>
					 </tr>

					 <tr>
					   <td><label for="Status">@lang('Control.TimeArrive')</label></td>
						<td>
								<div class="input-group date datetimepickerx" id="datetimepickerTimeArriveSendAttakByTime" data-target-input="nearest">
										<input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerTimeArriveSendAttakByTime"/>
										<div class="input-group-append" data-target="#datetimepickerTimeArriveSendAttakByTime" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
								</div>
								<div id="frommillscan_show" class="col-md-3" style="min-width: 194px; display: none;">
								<input type="number" min="0" id ='frommillscan'  value=100  max="1000" onchange="EditMillScSendAttakByTime(this)"    data-toggle="tooltip"  title="@lang('Control.frommillscanTitle')" placeholder="@lang('Control.frommillscan')" class="form-control">
							</div>
							<div id="tomillscand_show" class="col-md-3" style="min-width: 194px; display: none;">
								<input type="number" min="0" id ='tomillscand'  value=200  max="1000"  onchange="EditMillScSendAttakByTime(this)"  data-toggle="tooltip"  title="@lang('Control.tomillscandTitle')" placeholder="@lang('Control.tomillscand')" class="form-control">
							</div>
						</td>
					 </tr>


						  </tbody>
						  </table>

						  </div>

						<!-- Modal footer -->
						<div class="modal-footer">
						   <button type="button"  onclick="clacAddSendAttakByTime(this)"  class="btn btn-success" >@lang('Control.save')</button>
						  <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal">@lang('Control.Close')</button>
						</div>



					  </div>
					</div>
				  </div>
				  @endif
								<!-- End Show Deglio SendAttakByTime -->




              </div>

			</div>
		</div>
	</div>
 <!-- StartShow Deglio -->
   <div id="myModalSetExc" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">@lang('Control.Add Vili')</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
   <input type="hidden" id="idworldtemp" >
     <table class="table table-borderless">
     <thead>
      <tr>
        <th>@lang('Control.BotName') </th>
        <th>@lang('Control.Event')</th>
      </tr>
    </thead>
        <tbody>

      <tr>
       <td>  <label for="Status">@lang('Control.Bottheftassistant')</label>  </td>
        <td> <input type="checkbox" id='TheftbotRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off"> </td>
      </tr>
     <tr>
       <td><label for="Status">@lang('Control.BildingHelper')</label></td>
        <td> <input type="checkbox" id='BildingHelperBotbotRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off"> </td>
  		</tr>
  		<tr>

         <td><label for="Status">@lang('Control.Autotechup')</label></td>
        <td><input type="checkbox" id='AutotechupbotRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off"></td>
     </tr>
  		<tr>

         <td><label for="Status">@lang('Control.coinMaker')</label></td>
       <td><input type="checkbox" id='coinMakerbotRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off"></td>
      </tr>
  		<tr>

         <td><label for="Status">@lang('Control.SendResSnob')</label></td>
        <td><input type="checkbox" id='SendResSnobbotRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off"></td>
      </tr>
  		<tr>

         <td><label for="Status">@lang('Control.ResourceBalancer')</label></td>
        <td><input type="checkbox" id='ResourceBalancerbotRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off"></td>
      </tr>
  		<tr>

         <td><label for="Status">@lang('Control.MakeNewNabil')</label></td>
       <td> <input type="checkbox" id='MakeNewNabilbotRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off"></td>
      </tr>
  		<tr>

        <td> <label for="Status">@lang('Control.scavenge')</label></td>
        <td><input type="checkbox" id='scavengebotRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off"></td>
      </tr>
  		</tbody>
  		</table>

          </div>

        <!-- Modal footer -->
        <div class="modal-footer">
           <button type="button"  onclick="savesetexptionvileg()"  class="btn btn-success" data-dismiss="modal">@lang('Control.save')</button>
          <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal">@lang('Control.Close')</button>
        </div>



      </div>
    </div>
  </div>
                <!-- End Show Deglio -->


 <!-- StartShow FakeAttakEdit -->
 <div id="myModalFakeAttakEdit" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">@lang('Control.Add Vili')</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
   <input type="hidden" id="idworldtemp" >
     <table class="table table-borderless">
     <thead>
      <tr>
        <th>@lang('Control.settings') </th>
        <th>@lang('Control.data')</th>
      </tr>
    </thead>
        <tbody>

				<input type="hidden"  id ='idintedintng' >
				<input type="hidden"  id ='timaTemps' >
				<input type="hidden"  id ='idworld' >
      <tr>
       <td>  <label for="Status">@lang('Control.CountAttacK')</label>  </td>
        <td> <input type="number" min="1"  id ='CountAttacKedit' onchange="EditCountfakeAttaker(this)"  max="4" data-toggle="tooltip"  title="@lang('Control.CountAttacK')" placeholder="@lang('Control.CountAttacK')" class="form-control"></td>
	  </tr>

      <tr>
			<td>  <label for="Status">@lang('Control.SpyCount')</label>  </td>
			 <td> <input type="number" min="0"  id ='SpyCount'  onchange="EditspyfakeAttaker(this)" max="100000" data-toggle="tooltip"  title="@lang('Control.SpyCount')" placeholder="@lang('Control.SpyCount')" class="form-control"></td>
	 </tr>

     <tr>
       <td><label for="Status">@lang('Control.TimeArrive')</label></td>
        <td>
				<div class="input-group date datetimepickerx" id="datetimepickerTimeArrive" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" data-target="#datetimepickerTimeArrive"/>
						<div class="input-group-append" data-target="#datetimepickerTimeArrive" data-toggle="datetimepicker">
								<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
				</div>

		</td>
	 </tr>


  		</tbody>
  		</table>

          </div>

        <!-- Modal footer -->
        <div class="modal-footer">
           <button type="button"  onclick="clacEdit(this)"  class="btn btn-success" data-dismiss="modal">@lang('Control.save')</button>
          <button type="button" data-dismiss="modal" class="btn btn-danger" data-dismiss="modal">@lang('Control.Close')</button>
        </div>



      </div>
    </div>
  </div>
                <!-- End Show Deglio FakeAttakEdit -->

@endsection
@section('script')
$('input[id="run"]').change(function() {
    $("#hidearrmynonPro"+$(this).data('id')).hide();
    $("#hidearrmyPro"+$(this).data('id')).show();
try{

                    if ( $('#datasend'+$(this).data('id')+' input[id="runnopro"]')[0].checked)
                    {
                $($('#datasend'+$(this).data('id')+' input[id="runnopro"]')[0]).bootstrapToggle('off')

					}}
					catch(error) {}
				}

					)
$('input[id="runnopro"]').change(function() {
    $("#hidearrmyPro"+$(this).data('id')).hide();
    $("#hidearrmynonPro"+$(this).data('id')).show();
                    if ( $('#datasend'+$(this).data('id')+' input[id="run"]')[0].checked)
                    {
                $($('#datasend'+$(this).data('id')+' input[id="run"]')[0]).bootstrapToggle('off')

                    }})



@if ( \App\RunBots\PermationUser::checkup("MakeArrmy") || \App\RunBots\PermationUser::checkup("MakeArrmyNoPur") )
@yield('scriptAddTofileMakeArrmy')//MakeArrmy
@endif
@if ( \App\RunBots\PermationUser::checkup("FakeAttaks") )
@yield('scriptAddTofileFakeAttack')//FakeAttack
@endif
@if ( \App\RunBots\PermationUser::checkup("SendAttakByTime") )
@yield('scriptAddTofileSendAttakByTime')//SendAttakByTime
@endif
@if ( \App\RunBots\PermationUser::checkup("ThifHelperPlayers") )
@yield('scriptAddTofileThifHelperPlayers')//ThifHelperPlayers
@endif
//scrp1
function hideshow (thissender , id)
{
var name = $(thissender).data('id');
$('#datasend'+id+' div[id="'+name+'"]').toggle(800);
}

function AddTofileSetExceptionVilges(id)
{//SetException
/*      idworldtemp
		TheftbotRun
      BildingHelperBotbotRun
      AutotechupbotRun
      coinMakerbotRun
      SendResSnobbotRun
      ResourceBalancerbotRun
      MakeNewNabilbotRun
      scavengebotRun*/
     $('#idworldtemp').val(id);
     $('#TheftbotRun').bootstrapToggle('off');
     $('#BildingHelperBotbotRun').bootstrapToggle('off');
     $('#AutotechupbotRun').bootstrapToggle('off');
     $('#coinMakerbotRun').bootstrapToggle('off');
     $('#SendResSnobbotRun').bootstrapToggle('off');
     $('#ResourceBalancerbotRun').bootstrapToggle('off');
     $('#MakeNewNabilbotRun').bootstrapToggle('off');
     $('#scavengebotRun').bootstrapToggle('off');


     $('#myModalSetExc').modal('show');

}
function savesetexptionvileg()
{//SetException
/*      idworldtemp
		TheftbotRun
      BildingHelperBotbotRun
      AutotechupbotRun
      coinMakerbotRun
      SendResSnobbotRun
      ResourceBalancerbotRun
      MakeNewNabilbotRun
      scavengebotRun*/
   var id = $('#idworldtemp').val();

   var TheftbotRun = $('#TheftbotRun')[0].checked;
   var BildingHelperBotbotRun = $('#BildingHelperBotbotRun')[0].checked;
   var AutotechupbotRun  = $('#AutotechupbotRun')[0].checked;
   var coinMakerbotRun = $('#coinMakerbotRun')[0].checked;
   var SendResSnobbotRun = $('#SendResSnobbotRun')[0].checked;
   var ResourceBalancerbotRun=  $('#ResourceBalancerbotRun')[0].checked;
   var MakeNewNabilbotRun  = $('#MakeNewNabilbotRun')[0].checked;
   var scavengebotRun=  $('#scavengebotRun')[0].checked;

   var out ="Stop Bots : ";




  if ( !TheftbotRun)
  out += " @lang('Control.Bottheftassistant') ,";

    if ( !BildingHelperBotbotRun)
  out += " @lang('Control.BildingHelper') ,";

    if ( !AutotechupbotRun)
  out += " @lang('Control.Autotechup') ,";

    if ( !coinMakerbotRun)
  out += " @lang('Control.coinMaker') ,";

    if ( !SendResSnobbotRun)
  out += "  @lang('Control.SendResSnob') ,";

    if ( !ResourceBalancerbotRun)
  out += " @lang('Control.ResourceBalancer') ,";
    if ( !MakeNewNabilbotRun)
  out += " @lang('Control.MakeNewNabil'),";
    if ( !scavengebotRun)
  out += " @lang('Control.scavenge') ,";



       var  markup = "<tr  data-id='"+$('#datasend'+id+' select[id="namevileg5"]').val()+"' data-name='"+$('#datasend'+id+' select[id="namevileg5"] option:selected')[0].innerHTML
       + "' data-theftbotrun='"+ TheftbotRun
       + "' data-bildinghelperbotbotrun='"+ BildingHelperBotbotRun
       + "' data-autotechupbotrun='"+ AutotechupbotRun
       + "' data-coinmakerbotrun='"+ coinMakerbotRun
       + "' data-sendressnobbotrun='"+ SendResSnobbotRun
       + "' data-resourcebalancerbotrun='"+ ResourceBalancerbotRun
       + "' data-makenewnabilbotrun='"+ MakeNewNabilbotRun
       + "' data-scavengebotrun='"+ scavengebotRun
       +"' ><td>"+$('#datasend'+id+' select[id="namevileg5"] option:selected')[0].innerHTML+"</td><td>"+out +"</td><td>"+XButtonForTab+"</td></tr>";
               $("#DateAllSetExceptionVilges"+id).append(markup);
}

function submitForm(bottenSend , id){
event.preventDefault();
$(bottenSend).attr("disabled", true);
@if ( \App\RunBots\PermationUser::checkup("BilidingUpdade")  || \App\RunBots\PermationUser::checkup("BilidingUpdadeNoPor") )
//////////////////////////////////////////////////////////////////////////////
         var Bilidingfile = JSON.parse( '{"BilidingHlper":[],"run" :'+$('#datasend'+id+' input[id="BilidingfileRun"]')[0].checked+'}');
             listbilding[id] = Bilidingfile;


            $('#DateAllBilding'+id+' tr').each(function (a, b) {
                var name = $(this).data('nameofbild');
                var value = $(this).data('tolevel');
                  listbilding[id].BilidingHlper.push({ NameOfbild: name, ToLevel: value });


            });


$('#datasend'+id+' input[id="AlldataBiliding"]').val(JSON.stringify(listbilding[id]));
console.log(listbilding);@endif
@if ( \App\RunBots\PermationUser::checkup("CoinMakerBot") )
//////////////////////////////////////////////////////////////////////////////

if (Number.isInteger(parseInt( $('#datasend'+id+' input[id="MaxCoin"]').val() ))){
         var CoinMaker = JSON.parse( '{"CoinMaker":[] , "run" :'+$('#datasend'+id+' input[id="coinMakerRun"]')[0].checked+' , "max" : '+$('#datasend'+id+' input[id="MaxCoin"]').val()+'}' );
             listCoinMaker[id] = CoinMaker;


            $('#DateAllCoinVilges'+id+' tr').each(function (a, b) {
                var name = $(this).data('name');
                var value = $(this).data('id');
                  listCoinMaker[id].CoinMaker.push({ name: name, id: value });


            });


$('#datasend'+id+' input[id="AlldataCoinMaker"]').val(JSON.stringify(listCoinMaker[id]));
console.log(listCoinMaker);
}
@endif
@if ( \App\RunBots\PermationUser::checkup("SendResSnob") )
//////////////////////////////////////////////////////////////////////////////

         var SendResSnob = JSON.parse( '{"SendResSnob":[] , "run" :'+$('#datasend'+id+' input[id="SendResSnobRun"]')[0].checked+'}' );
             listSendResSnob[id] = SendResSnob;


            $('#DateAllSendResSnobVilges'+id+' tr').each(function (a, b) {
                var name = $(this).data('name');
                var value = $(this).data('id');
                var time = $(this).data('time');
                  listSendResSnob[id].SendResSnob.push({ name: name, id: value, time: time  });


            });


$('#datasend'+id+' input[id="AlldataSendResSnob"]').val(JSON.stringify(listSendResSnob[id]));
console.log(listSendResSnob);
@endif
@if ( \App\RunBots\PermationUser::checkup("NewBarbarAttack") )
//////////////////////////////////////////////////////////////////////////////NewBarbarAttack

         var NewBarbarAttack = JSON.parse( '{ "run" :'+$('#datasend'+id+' input[id="NewBarbarAttackRun"]')[0].checked+' ,'+ '"maxstep" :'+$('#datasend'+id+' input[id="NewBarbarAttackMaxStep"]').val()+'}' );
             listNewBarbarAttack[id] = NewBarbarAttack;



$('#datasend'+id+' input[id="AlldataNewBarbarAttack"]').val(JSON.stringify(listNewBarbarAttack[id]));
console.log(listNewBarbarAttack);
@endif
@if ( \App\RunBots\PermationUser::checkup("smashingwalls") )
//////////////////////////////////////////////////////////////////////////////smashingwalls

         var smashingwalls = JSON.parse( '{ "run" :'+$('#datasend'+id+' input[id="smashingwallsRun"]')[0].checked+' ,'+
         '"maxstep" :'+$('#datasend'+id+' input[id="smashingwallsMaxStep"]').val()+' ,'+'"mark" :'+$('#datasend'+id+' input[id="smashingwallsMark"]').val()+'}' );
             listsmashingwalls[id] = smashingwalls;



$('#datasend'+id+' input[id="Alldatasmashingwalls"]').val(JSON.stringify(listsmashingwalls[id]));
console.log(listsmashingwalls);

@endif
@if ( \App\RunBots\PermationUser::checkup("ResourceBalancer") )
//////////////////////////////////////////////////////////////////////////////ResourceBalancer
if ($('#datasend'+id+' input[id="ResourceBalancerWood"]')[0].checked)
var ResourceBalancerWood=0;
else
var ResourceBalancerWood=400000;
if ($('#datasend'+id+' input[id="ResourceBalancerStone"]')[0].checked)
var ResourceBalancerStone=0;
else
var ResourceBalancerStone=400000;
if ($('#datasend'+id+' input[id="ResourceBalancerIron"]')[0].checked)
var ResourceBalancerIron=0;
else
var ResourceBalancerIron=400000;

var ResourceBalancerFields= $('#datasend'+id+' select[id="ResourceBalancerFields"]').val();

         var ResourceBalancer = JSON.parse( '{"ResourceBalancer":[] , "run" :'+$('#datasend'+id+' input[id="ResourceBalancerRun"]')[0].checked+' ,"Wood":'+ResourceBalancerWood+',"Stone":'+ResourceBalancerStone+',"Iron":'+ResourceBalancerIron+',"Fields":'+ResourceBalancerFields +'}' );
             listResourceBalancer[id] = ResourceBalancer;


            $('#DateAllResourceBalancerVilges'+id+' tr').each(function (a, b) {
                var name = $(this).data('name');
                var value = $(this).data('id');

                  listResourceBalancer[id].ResourceBalancer.push({ name: name, id: value  });


            });


$('#datasend'+id+' input[id="AlldataResourceBalancer"]').val(JSON.stringify(listResourceBalancer[id]));
console.log(listResourceBalancer);
@endif
@if ( \App\RunBots\PermationUser::checkup("MakeNewNabilBot") )
//////////////////////////////////////////////////////////////////////////////MakeNewNabil

       var MakeNewNabil = JSON.parse( '{"MakeNewNabil":[] , "run" :'+$('#datasend'+id+' input[id="MakeNewNabilRun"]')[0].checked+'}' );
             listMakeNewNabil[id] = MakeNewNabil;


            $('#DateAllMakeNewNabilVilges'+id+' tr').each(function (a, b) {
                var name = $(this).data('name');
                var value = $(this).data('id');
                var count = $(this).data('count');
                  listMakeNewNabil[id].MakeNewNabil.push({ name: name, id: value, count: count  });


            });


$('#datasend'+id+' input[id="AlldataMakeNewNabil"]').val(JSON.stringify(listMakeNewNabil[id]));
console.log(listMakeNewNabil);
@endif


@if ( \App\RunBots\PermationUser::checkup("MakeArrmy") || \App\RunBots\PermationUser::checkup("MakeArrmyNoPur") )
@yield('scriptGetToSaveInMakeArrmy')
@endif
@if ( \App\RunBots\PermationUser::checkup("FakeAttaks") )
@yield('scriptGetToSaveInFakeAttack')//FakeAttack
@endif
@if ( \App\RunBots\PermationUser::checkup("SendAttakByTime") )
@yield('scriptGetToSaveInSendAttakByTime')//SendAttakByTime
@endif
@if ( \App\RunBots\PermationUser::checkup("ThifHelperPlayers") )
@yield('scriptGetToSaveInThifHelperPlayers')//ThifHelperPlayers
@endif
//scrp2
@if ( \App\RunBots\PermationUser::checkup("scavengebot") ||  \App\RunBots\PermationUser::checkup("scavengeNoPor") )
//////////////////////////////////////////////////////////////////////////////scavenge
       var scavenge = JSON.parse( '{"scavenge":[] , "run" :'+$('#datasend'+id+' input[id="scavengeRun"]')[0].checked+'}' );
             listscavenge[id] = scavenge;
             var jj = 0;
             var ii = 0;
             @if (!$newscvange)
             /////////////1//////////////
             ////////ATTAC
  		var spearA1 = $('#datasend'+id+' input[id="spearscavengeA"]')[0].value;
        var swordA1 = $('#datasend'+id+' input[id="swordscavengeA"]')[0].value;
        var axeA1 = $('#datasend'+id+' input[id="axescavengeA"]')[0].value;
        var archerA1 =  $('#datasend'+id+' input[id="archerscavengeA"]')[0].value; // new
        var marcherA1 =  $('#datasend'+id+' input[id="marcherscavengeA"]')[0].value; // new
        var lightA1 =  $('#datasend'+id+' input[id="lightscavengeA"]')[0].value;
        var heavyA1 =  $('#datasend'+id+' input[id="heavyscavengeA"]')[0].value;
        var knightA1 =  $('#datasend'+id+' input[id="knightscavengeA"]')[0].value;
        @endif
        ///////////DEF
  		var spearD1 = $('#datasend'+id+' input[id="spearscavengeD"]')[0].value;
        var swordD1 = $('#datasend'+id+' input[id="swordscavengeD"]')[0].value;
        var axeD1 = $('#datasend'+id+' input[id="axescavengeD"]')[0].value;
        var archerD1 =  $('#datasend'+id+' input[id="archerscavengeD"]')[0].value; // new
        var marcherD1 =  $('#datasend'+id+' input[id="marcherscavengeD"]')[0].value; // new
        var lightD1 =  $('#datasend'+id+' input[id="lightscavengeD"]')[0].value;
        var heavyD1 =  $('#datasend'+id+' input[id="heavyscavengeD"]')[0].value;
        var knightD1 =  $('#datasend'+id+' input[id="knightscavengeD"]')[0].value;


        @if (!$newscvange)
        listscavenge[id].scavenge.push({ spearA: spearA1, swordA: swordA1, axeA: axeA1 ,  archerA: archerA1, marcherA: marcherA1, lightA: lightA1 ,heavyA: heavyA1  , knightA :knightA1 ,spearD: spearD1, swordD: swordD1, axeD: axeD1 ,  archerD: archerD1, marcherD: marcherD1, lightD: lightD1 , heavyD: heavyD1  , knightD: knightD1  });
  @else
  listscavenge[id].scavenge.push({spearD: spearD1, swordD: swordD1, axeD: axeD1 ,  archerD: archerD1, marcherD: marcherD1, lightD: lightD1 , heavyD: heavyD1  , knightD: knightD1  });

  @endif	/////////////2//////////////
             ////////ATTAC

             var ii = 2;
        @if (!$newscvange)
  		var spearA1 = $('#datasend'+id+' input[id="spearscavengeA'+ii+'"]')[0].value;
        var swordA1 = $('#datasend'+id+' input[id="swordscavengeA'+ii+'"]')[0].value;
        var axeA1 = $('#datasend'+id+' input[id="axescavengeA'+ii+'"]')[0].value;
        var archerA1 =  $('#datasend'+id+' input[id="archerscavengeA'+ii+'"]')[0].value; // new
        var marcherA1 =  $('#datasend'+id+' input[id="marcherscavengeA'+ii+'"]')[0].value; // new
        var lightA1 =  $('#datasend'+id+' input[id="lightscavengeA'+ii+'"]')[0].value;
        var heavyA1 =  $('#datasend'+id+' input[id="heavyscavengeA'+ii+'"]')[0].value;
        var knightA1 =  $('#datasend'+id+' input[id="knightscavengeA'+ii+'"]')[0].value;
        @endif
        ///////////DEF
  		var spearD1 = $('#datasend'+id+' input[id="spearscavengeD'+ii+'"]')[0].value;
        var swordD1 = $('#datasend'+id+' input[id="swordscavengeD'+ii+'"]')[0].value;
        var axeD1 = $('#datasend'+id+' input[id="axescavengeD'+ii+'"]')[0].value;
        var archerD1 =  $('#datasend'+id+' input[id="archerscavengeD'+ii+'"]')[0].value; // new
        var marcherD1 =  $('#datasend'+id+' input[id="marcherscavengeD'+ii+'"]')[0].value; // new
        var lightD1 =  $('#datasend'+id+' input[id="lightscavengeD'+ii+'"]')[0].value;
        var heavyD1 =  $('#datasend'+id+' input[id="heavyscavengeD'+ii+'"]')[0].value;
        var knightD1 =  $('#datasend'+id+' input[id="knightscavengeD'+ii+'"]')[0].value;



        @if (!$newscvange)
        listscavenge[id].scavenge.push({ spearA: spearA1, swordA: swordA1, axeA: axeA1 ,  archerA: archerA1, marcherA: marcherA1, lightA: lightA1 ,heavyA: heavyA1  , knightA :knightA1 ,spearD: spearD1, swordD: swordD1, axeD: axeD1 ,  archerD: archerD1, marcherD: marcherD1, lightD: lightD1 , heavyD: heavyD1  , knightD: knightD1  });
  @else
  listscavenge[id].scavenge.push({spearD: spearD1, swordD: swordD1, axeD: axeD1 ,  archerD: archerD1, marcherD: marcherD1, lightD: lightD1 , heavyD: heavyD1  , knightD: knightD1  });

  @endif		/////////////3//////////////
             ////////ATTAC

             var ii = 3;
             @if (!$newscvange)
  		var spearA1 = $('#datasend'+id+' input[id="spearscavengeA'+ii+'"]')[0].value;
        var swordA1 = $('#datasend'+id+' input[id="swordscavengeA'+ii+'"]')[0].value;
        var axeA1 = $('#datasend'+id+' input[id="axescavengeA'+ii+'"]')[0].value;
        var archerA1 =  $('#datasend'+id+' input[id="archerscavengeA'+ii+'"]')[0].value; // new
        var marcherA1 =  $('#datasend'+id+' input[id="marcherscavengeA'+ii+'"]')[0].value; // new
        var lightA1 =  $('#datasend'+id+' input[id="lightscavengeA'+ii+'"]')[0].value;
        var heavyA1 =  $('#datasend'+id+' input[id="heavyscavengeA'+ii+'"]')[0].value;
        var knightA1 =  $('#datasend'+id+' input[id="knightscavengeA'+ii+'"]')[0].value;
        @endif
        ///////////DEF
  		var spearD1 = $('#datasend'+id+' input[id="spearscavengeD'+ii+'"]')[0].value;
        var swordD1 = $('#datasend'+id+' input[id="swordscavengeD'+ii+'"]')[0].value;
        var axeD1 = $('#datasend'+id+' input[id="axescavengeD'+ii+'"]')[0].value;
        var archerD1 =  $('#datasend'+id+' input[id="archerscavengeD'+ii+'"]')[0].value; // new
        var marcherD1 =  $('#datasend'+id+' input[id="marcherscavengeD'+ii+'"]')[0].value; // new
        var lightD1 =  $('#datasend'+id+' input[id="lightscavengeD'+ii+'"]')[0].value;
        var heavyD1 =  $('#datasend'+id+' input[id="heavyscavengeD'+ii+'"]')[0].value;
        var knightD1 =  $('#datasend'+id+' input[id="knightscavengeD'+ii+'"]')[0].value;



        @if (!$newscvange)
        listscavenge[id].scavenge.push({ spearA: spearA1, swordA: swordA1, axeA: axeA1 ,  archerA: archerA1, marcherA: marcherA1, lightA: lightA1 ,heavyA: heavyA1  , knightA :knightA1 ,spearD: spearD1, swordD: swordD1, axeD: axeD1 ,  archerD: archerD1, marcherD: marcherD1, lightD: lightD1 , heavyD: heavyD1  , knightD: knightD1  });
  @else
  listscavenge[id].scavenge.push({spearD: spearD1, swordD: swordD1, axeD: axeD1 ,  archerD: archerD1, marcherD: marcherD1, lightD: lightD1 , heavyD: heavyD1  , knightD: knightD1  });

  @endif		/////////////4//////////////
             ////////ATTAC

             var ii = 4;
        @if (!$newscvange)
  		var spearA1 = $('#datasend'+id+' input[id="spearscavengeA'+ii+'"]')[0].value;
        var swordA1 = $('#datasend'+id+' input[id="swordscavengeA'+ii+'"]')[0].value;
        var axeA1 = $('#datasend'+id+' input[id="axescavengeA'+ii+'"]')[0].value;
        var archerA1 =  $('#datasend'+id+' input[id="archerscavengeA'+ii+'"]')[0].value; // new
        var marcherA1 =  $('#datasend'+id+' input[id="marcherscavengeA'+ii+'"]')[0].value; // new
        var lightA1 =  $('#datasend'+id+' input[id="lightscavengeA'+ii+'"]')[0].value;
        var heavyA1 =  $('#datasend'+id+' input[id="heavyscavengeA'+ii+'"]')[0].value;
        var knightA1 =  $('#datasend'+id+' input[id="knightscavengeA'+ii+'"]')[0].value;
        @endif
        ///////////DEF
  		var spearD1 = $('#datasend'+id+' input[id="spearscavengeD'+ii+'"]')[0].value;
        var swordD1 = $('#datasend'+id+' input[id="swordscavengeD'+ii+'"]')[0].value;
        var axeD1 = $('#datasend'+id+' input[id="axescavengeD'+ii+'"]')[0].value;
        var archerD1 =  $('#datasend'+id+' input[id="archerscavengeD'+ii+'"]')[0].value; // new
        var marcherD1 =  $('#datasend'+id+' input[id="marcherscavengeD'+ii+'"]')[0].value; // new
        var lightD1 =  $('#datasend'+id+' input[id="lightscavengeD'+ii+'"]')[0].value;
        var heavyD1 =  $('#datasend'+id+' input[id="heavyscavengeD'+ii+'"]')[0].value;
        var knightD1 =  $('#datasend'+id+' input[id="knightscavengeD'+ii+'"]')[0].value;



        @if (!$newscvange)
                  listscavenge[id].scavenge.push({ spearA: spearA1, swordA: swordA1, axeA: axeA1 ,  archerA: archerA1, marcherA: marcherA1, lightA: lightA1 ,heavyA: heavyA1  , knightA :knightA1 ,spearD: spearD1, swordD: swordD1, axeD: axeD1 ,  archerD: archerD1, marcherD: marcherD1, lightD: lightD1 , heavyD: heavyD1  , knightD: knightD1  });
            @else
            listscavenge[id].scavenge.push({spearD: spearD1, swordD: swordD1, axeD: axeD1 ,  archerD: archerD1, marcherD: marcherD1, lightD: lightD1 , heavyD: heavyD1  , knightD: knightD1  });

            @endif


$('#datasend'+id+' input[id="Alldatascavenge"]').val(JSON.stringify(listscavenge[id]));
console.log(listscavenge);
@endif
@if ( \App\RunBots\PermationUser::checkup("SetExceptionVillages") )
//////////////////////////////////////////////////////////////////////////////SetException



       var SetException = JSON.parse( '{"SetException":[] }' );
             listSetException[id] = SetException;


            $('#DateAllSetExceptionVilges'+id+' tr').each(function (a, b) {
                var name = $(this).data('name');
                var value = $(this).data('id');

              var theftbotrun = $(this).data('theftbotrun');
              var  bildinghelperbotbotrun= $(this).data('bildinghelperbotbotrun');
              var autotechupbotrun = $(this).data('autotechupbotrun');
              var coinmakerbotrun= $(this).data('coinmakerbotrun');
              var sendressnobbotrun= $(this).data('sendressnobbotrun');
              var  resourcebalancerbotrun= $(this).data('resourcebalancerbotrun');
              var  makenewnabilbotrun= $(this).data('makenewnabilbotrun');
              var  scavengebotrun= $(this).data('scavengebotrun');

                  listSetException[id].SetException.push({ name: name, id: value,
                   theftbotrun: theftbotrun , bildinghelperbotbotrun : bildinghelperbotbotrun ,
                   autotechupbotrun:autotechupbotrun ,
                   coinmakerbotrun : coinmakerbotrun,
                   sendressnobbotrun: sendressnobbotrun ,
                   resourcebalancerbotrun : resourcebalancerbotrun ,
                   makenewnabilbotrun : makenewnabilbotrun,
                   scavengebotrun : scavengebotrun
                    });


            });


$('#datasend'+id+' input[id="AlldataSetException"]').val(JSON.stringify(listSetException[id]));
console.log(listSetException);

@endif
@if ( \App\RunBots\PermationUser::checkup("SendResourceViliges") )
//////////////////////////////////////////////////////////////////////////////SendResourceViliges

var SendResourceViliges = JSON.parse( '{"SendResourceViliges":[] , "run" :'+$('#datasend'+id+' input[id="SendResourceViligesRun"]')[0].checked+'}' );
     listSendResourceViliges[id] = SendResourceViliges;


    $('#DateAllSendResourceViligesVilges'+id+' tr').each(function (a, b) {
        var x =      $(this).data('x');
        var y =      $(this).data('y');
        var resmax = $(this).data('resmax');
        var MaxResSend = $(this).data('maxressend');
        listSendResourceViliges[id].SendResourceViliges.push({ x: x, y: y, resmax: resmax , MaxResSend: MaxResSend  });


    });

$('#datasend'+id+' input[id="AlldataSendResourceViliges"]').val(JSON.stringify(listSendResourceViliges[id]));
console.log(listSendResourceViliges);

@endif



/////////////////////////////////////////////////
@if ( \App\RunBots\PermationUser::checkup("MarketBuyResourser"))
@include('bots.MarketBuyResourser.JSSaveKey')
@endif
@if ( \App\RunBots\PermationUser::checkup("MarketSellResourser"))
@include('bots.MarketSellResourser.JSSaveKey')
@endif
//////////////////////////////////////////////////////////////////////////////
$.ajax({url:'/api/SaveSettingsBotsWorld', type: 'post' , data : $("#datasend"+id).serialize() ,  success :function(data) {
			if ( data.error == 0 )
			{
			 $(bottenSend).removeAttr("disabled");

	$.alert({
	    title: '@lang("login.An_S")',
	    content: '@lang("Control.DescrptionDilogSecsses")',


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


			}else
			{
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
			 $(bottenSend).removeAttr("disabled");
			}


    }

    , error :function(data){
    			 $(bottenSend).removeAttr("disabled");

    $.alert({
	    title: '@lang("login.An_F")',
	    content: '@lang("Control.ErrorContions")',


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
 var XButtonForTab = '<button type="button" class="btn btn-link"   onclick="RemovethisItem(this)" ><i class="fa fa-trash" aria-hidden="true"></i></button><button type="button" class="btn btn-link move down" onclick="updownx(this)"    ><i class="fa fa-long-arrow-down" aria-hidden="true"></i></button><button type="button" class="btn btn-link move up"  onclick="updownx(this)" ><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button>';

function RemovethisItem(bb)
 {
  console.log( $(bb).closest ('form').data('id'));
  console.log( $(bb).closest ('tr').data('id'));
  var idt =  $(bb).closest ('tr').data('id');
  var idf = $(bb).closest ('form').data('id')
    $(bb).closest ('tr').remove ();


 }
function AddTofileBilding(id)
{
    if (Number.isInteger(parseInt( $('#datasend'+id+' input[id="inputnumberoflevelupdate"]').val())))
    {
        //	if (listbilding[id]


        var markup = "<tr data-nameOfbild='"+$('#datasend'+id+' select[id="selectType"]').val()+"' data-tolevel='"+ $('#datasend'+id+' input[id="inputnumberoflevelupdate"]').val()+"' data-id="+ id +"><td>"+$('#datasend'+id+' select[id="selectType"] option:selected')[0].innerHTML+"</td><td>@lang('Control.ToLevel')"+ $('#datasend'+id+' input[id="inputnumberoflevelupdate"]').val()+"</td><td>"+XButtonForTab+"</td></tr>";

         $("#DateAllBilding"+id).append(markup);
        /* 	var BilidingHlperTemp = JSON.parse( '{"NameOfbild":"main","ToLevel":0}');

              BilidingHlperTemp.NameOfbild = $('#datasend'+id+' select[id="selectType"]').val();
              BilidingHlperTemp.ToLevel = $('#datasend'+id+' input[id="inputnumberoflevelupdate"]').val();
                  listbilding[id].BilidingHlper[listbilding[id].BilidingHlper.length] = BilidingHlperTemp;*/

    }
}

function AddTofileCoinVilges(id)
{

        //	if (listbilding[id]


     var  markup = "<tr  data-id='"+$('#datasend'+id+' select[id="namevileg"]').val()+"' data-name='"+$('#datasend'+id+' select[id="namevileg"] option:selected')[0].innerHTML+"' ><td>"+$('#datasend'+id+' select[id="namevileg"] option:selected')[0].innerHTML+"</td><td>"+XButtonForTab+"</td></tr>";

         $("#DateAllCoinVilges"+id).append(markup);


}
function AddTofileSendResSnobVilges(id)
{

        //	if (listbilding[id]


     var  markup = "<tr  data-id='"+$('#datasend'+id+' select[id="namevileg2"]').val()+"' data-name='"+$('#datasend'+id+' select[id="namevileg2"] option:selected')[0].innerHTML+"' data-time='"+$('#datasend'+id+' input[id="timeofsenddatasnop"]')[0].value +"' ><td>"+$('#datasend'+id+' select[id="namevileg2"] option:selected')[0].innerHTML+"</td><td>"+$('#datasend'+id+' input[id="timeofsenddatasnop"]')[0].value +"</td><td>"+XButtonForTab+"</td></tr>";

         $("#DateAllSendResSnobVilges"+id).append(markup);


}
function AddTofileResourceBalancerVilges(id)
{

        //	if (listbilding[id]


     var  markup = "<tr  data-id='"+$('#datasend'+id+' select[id="namevileg3"]').val()+"' data-name='"+$('#datasend'+id+' select[id="namevileg3"] option:selected')[0].innerHTML+"' ><td>"+$('#datasend'+id+' select[id="namevileg3"] option:selected')[0].innerHTML+"</td>><td>"+XButtonForTab+"</td></tr>";

         $("#DateAllResourceBalancerVilges"+id).append(markup);


}



//MakeNewNabil
  function AddTofileMakeNewNabilVilges(id)
{

        //	if (listbilding[id]

      if (Number.isInteger(parseInt( $('#datasend'+id+' input[id="numberofNabil"]').val())))
            if ( $('#datasend'+id+' select[id="namevileg4"]').val() !="")
    {
        if ( parseInt( $('#datasend'+id+' input[id="numberofNabil"]').val())>0){


     var  markup = "<tr  data-id='"+$('#datasend'+id+' select[id="namevileg4"]').val()+"' data-name='"+$('#datasend'+id+' select[id="namevileg4"] option:selected')[0].innerHTML+"' data-count='"+$('#datasend'+id+' input[id="numberofNabil"]')[0].value +"' ><td>"+$('#datasend'+id+' select[id="namevileg4"] option:selected')[0].innerHTML+"</td><td>"+$('#datasend'+id+' input[id="numberofNabil"]')[0].value +"</td><td>"+XButtonForTab+"</td></tr>";
               $("#DateAllMakeNewNabilVilges"+id).append(markup);
      }
    }
      else{
        var gropid = $($('#datasend'+id+' select[id="idviligenewnabels"]')[0]).val()[0];
          if ( gropid != undefined )
        if ( parseInt( $('#datasend'+id+' input[id="numberofNabil"]').val())>0 ){



            $.ajax({url:'/api/GetGroupsViligesId?id='+id+'&idgro='+gropid, type: 'get'  ,  success :function(data) {
                console.log(data);
                if ( data.error == 0 )
                {

             for (var j = 0; j < data.data.length;j++ ) {


                var  markup = "<tr  data-id='"+data.data[j]+"' data-name='"+viligestart(id,data.data[j]).name+"' data-count='"+$('#datasend'+id+' input[id="numberofNabil"]')[0].value +"' ><td>"+viligestart(id,data.data[j]).name+"</td><td>"+$('#datasend'+id+' input[id="numberofNabil"]')[0].value +"</td><td>"+XButtonForTab+"</td></tr>";
                $("#DateAllMakeNewNabilVilges"+id).append(markup);
                }


                    }else{

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


      }

}
//SendResourceViliges


function AddTofileSendResourceViligesVilges(id)
{

        //	if (listbilding[id]

   var array= $('#datasend'+id+' input[id="ViligXY"]').val().split('|');
   console.log(array);
   if ( array.length != 2)
   return ;
      var x = array [0];
   var y = array [1];

   if (Number.isInteger(parseInt( $('#datasend'+id+' input[id="maxstepsendtoviligRes"]').val()))<0 && Number.isInteger(parseInt(x)) <0 && Number.isInteger(parseInt(y))<0)
   return ;


   var resmax = $('#datasend'+id+' input[id="maxstepsendtoviligRes"]').val();
   var MaxResSend = $('#datasend'+id+' input[id="MaxResSend"]').val();
   if ( Number.isInteger(parseInt( MaxResSend))<0)
   MaxResSend = 0;
   var  markup = "<tr  data-x='"+x+"' data-y='"+y+"' data-resmax='"+resmax+"' data-maxressend='"+MaxResSend+"' ><td>"+$('#datasend'+id+' input[id="ViligXY"]').val()+"</td><td>"+resmax +"</td><td>"+MaxResSend +"</td><td>"+XButtonForTab+"</td></tr>";
               $("#DateAllSendResourceViligesVilges"+id).append(markup);


}
var listbilding = [];
var listCoinMaker=[];
var listSendResSnob=[];
var listResourceBalancer=[];
var listMakeNewNabil=[];
var listscavenge = [];
var listSetException = [];
var listSendResourceViliges=[];
var listNewBarbarAttack=[];
var listsmashingwalls=[];
var listMakeArrmy=[];
var listFakeAttack=[];
var listViliges = [];
var listSendAttakByTime=[];
var listThifHelperPlayers =[];
var listMarketBuyResourser = [];
var listMarketSellResourser = [];

//

$(function () {

          @foreach ($worlds as $world)
				<?php

					$Viligname = json_decode( $world->jsonbotdatas);
								if (isset ($Viligname->Allvligs->Allvligs)){
						$Viligname = $Viligname->Allvligs->Allvligs;

						usort($Viligname, array("App\Http\Controllers\HomeController","cmpX"));

					}
				else
						$Viligname= null;

                $Bliding= json_decode( $world->jsonbotssettings);
                $jsonbotssettings= json_decode( $world->jsonbotssettings);

				if (isset($Bliding->MakeNewNabil))
				    $MakeNewNabil= $Bliding->MakeNewNabil;
				    else
				        $MakeNewNabil=null;

				if (isset($Bliding->SendResSnob))
				    $SendResSnob= $Bliding->SendResSnob;
				    else
				        $SendResSnob=null;

		        if (isset($Bliding->ResourceBalancer))
		            $ResourceBalancer= $Bliding->ResourceBalancer;
	            else
	                $ResourceBalancer=null;


				if (isset($Bliding->CoinMaker))
				    $CoinMaker= $Bliding->CoinMaker;
				    else
				     $CoinMaker=null;
				     //scavenge
				     if (isset($Bliding->scavenge))
				         $scavenge= $Bliding->scavenge;
		         else
		             $scavenge=null;


					//FakeAttack
					if (isset($Bliding->FakeAttack))
		            $FakeAttack= $Bliding->FakeAttack;
	            	else
					$FakeAttack=null;

					//SendAttakByTime
					if (isset($Bliding->SendAttakByTime))
		            $SendAttakByTime= $Bliding->SendAttakByTime;
	            	else
					$SendAttakByTime=null;



		             //SetException
	             if (isset($Bliding->SetException))
	                 $SetException= $Bliding->SetException;
	                 else
	                     $SetException=null;
	                     //SendResourceViliges
	            if (isset($Bliding->SendResourceViliges))
	                $SendResourceViliges= $Bliding->SendResourceViliges;
                 else
                     $SendResourceViliges=null;

                     //listMakeArrmy

                     if (isset($Bliding->MakeArrmy))
					$MakeArrmy= $Bliding->MakeArrmy;
					else
					$MakeArrmy=null;


				   //listThifHelperPlayers
				   if (isset($Bliding->ThifHelperPlayers))
					$ThifHelperPlayers= $Bliding->ThifHelperPlayers;
					else
					$ThifHelperPlayers=null;



					if (isset($Bliding->Bilidingfile))
					$Bliding= $Bliding->Bilidingfile;
					else
					$Bliding=null;


				?>
            @if ( $Bliding != null)
             listbilding[{{$world->id}}] = JSON.parse( '<?php echo json_encode($Bliding)?>');
 			  @endif
               @if ( $CoinMaker != null)
               try {
             listCoinMaker[{{$world->id}}] = JSON.parse( '<?php echo json_encode($CoinMaker)?>');
            }
            catch(error) {
              console.log(error);
            }
            @endif
             @if ( $SendResSnob != null)
             try {
             listSendResSnob[{{$world->id}}] = JSON.parse( '<?php echo json_encode($SendResSnob)?>');
            }
            catch(error) {
              console.log(error);
            }
            @endif
             @if ( $ResourceBalancer != null)
             try {
             listResourceBalancer[{{$world->id}}] = JSON.parse( '<?php echo json_encode($ResourceBalancer)?>');
            }
            catch(error) {
              console.log(error);
            }
            @endif // scavenge
             @if ( $scavenge != null)
             try {
             listscavenge[{{$world->id}}] = JSON.parse( '<?php echo json_encode($scavenge)?>');
            }
            catch(error) {
              console.log(error);
            }
            @endif
             @if ( $MakeNewNabil != null)
             try {
             listMakeNewNabil[{{$world->id}}] = JSON.parse( '<?php echo json_encode($MakeNewNabil)?>');
            }
            catch(error) {
              console.log(error);
            }
            @endif
            @if ( $SetException != null)
            try {
             listSetException[{{$world->id}}] = JSON.parse( '<?php echo json_encode($SetException)?>');
            }
            catch(error) {
              console.log(error);
            }
            @endif
            @if ( $SendResourceViliges != null)
            try {
             listSendResourceViliges[{{$world->id}}] = JSON.parse( '<?php echo json_encode($SendResourceViliges)?>');
            }
            catch(error) {
              console.log(error);
            }
            @endif
            @if ( $MakeArrmy != null)
            try {
             listMakeArrmy[{{$world->id}}] = JSON.parse( '<?php echo json_encode($MakeArrmy)?>');
            }
            catch(error) {
              console.log(error);
            }
            @endif
            @if ( $FakeAttack != null)
            try {
            listFakeAttack[{{$world->id}}] = JSON.parse( '<?php echo json_encode($FakeAttack)?>');
        }
        catch(error) {
          console.log(error);
        }
			@endif
            @if ( $SendAttakByTime != null)
            try {
            listSendAttakByTime[{{$world->id}}] = JSON.parse( '<?php echo json_encode($SendAttakByTime)?>');
        }
        catch(error) {
          console.log(error);
        }
			@endif
            @if ( $ThifHelperPlayers != null)
            try {
            listThifHelperPlayers[{{$world->id}}] = JSON.parse( '<?php echo json_encode($ThifHelperPlayers)?>');
        }
        catch(error) {
          console.log(error);
        }
			@endif
            @if ( $Viligname != null)
            try {
            listViliges[{{$world->id}}] = JSON.parse( '<?php echo json_encode($Viligname)?>');
        }
        catch(error) {
          console.log(error);
        }
            @endif

          @if ( \App\RunBots\PermationUser::checkup("MarketBuyResourser"))
          @include('bots.MarketBuyResourser.JS')
          @endif
          @if ( \App\RunBots\PermationUser::checkup("MarketSellResourser"))
          @include('bots.MarketSellResourser.JS')
          @endif


            @endforeach

////////////////////////////////////////////
            Object.keys(listbilding).forEach(function (key) {
var markup = '' ;
var i = 0;

listbilding[key].BilidingHlper.forEach(function(element) {

markup += "<tr  data-nameofbild='"+element.NameOfbild+"' data-tolevel='"+element.ToLevel+"' data-id="+(i++) +"><td>"+translaterword[element.NameOfbild]+"</td><td>@lang('Control.ToLevel')"+ element.ToLevel+"</td><td>"+XButtonForTab+"</td></tr>";

});
         $("#DateAllBilding"+key).append(markup);

});

////////////////////////////////////////////
            Object.keys(listCoinMaker).forEach(function (key) {
var markup = '' ;
var i = 0;

listCoinMaker[key].CoinMaker.forEach(function(element) {

markup += "<tr  data-name='"+element.name+"' data-id='"+element.id+"' ><td>"+element.name+"</td><td>"+XButtonForTab+"</td></tr>";

});
         $("#DateAllCoinVilges"+key).append(markup);

});
////////////////////////////////////////////
            Object.keys(listSendResSnob).forEach(function (key) {
var markup = '' ;
var i = 0;

listSendResSnob[key].SendResSnob.forEach(function(element) {

markup += "<tr  data-name='"+element.name+"' data-id='"+element.id+"' data-time='"+element.time+"'><td>"+element.name+"</td><td>"+element.time+"</td><td>"+XButtonForTab+"</td></tr>";

});

         $("#DateAllSendResSnobVilges"+key).append(markup);

});
////////////////////////////////////////////ResourceBalancer
            Object.keys(listResourceBalancer).forEach(function (key) {
var markup = '' ;
var i = 0;

listResourceBalancer[key].ResourceBalancer.forEach(function(element) {

markup += "<tr  data-name='"+element.name+"' data-id='"+element.id+"'><td>"+element.name+"</td><td>"+XButtonForTab+"</td></tr>";

});

         $("#DateAllResourceBalancerVilges"+key).append(markup);

});

@if ( \App\RunBots\PermationUser::checkup("MakeArrmy") || \App\RunBots\PermationUser::checkup("MakeArrmyNoPur") )
@yield('MakeArrmykeys')
@endif
@if ( \App\RunBots\PermationUser::checkup("FakeAttaks") )
@yield('FakeAttackkeys')//FakeAttackkeys
@endif
@if ( \App\RunBots\PermationUser::checkup("SendAttakByTime") )
@yield('SendAttakByTimekeys')//SendAttakByTime
@endif
@if ( \App\RunBots\PermationUser::checkup("ThifHelperPlayers") )
@yield('ThifHelperPlayerskeys')//ThifHelperPlayers
@endif
//scrp3
////////////////////////////////////////////MakeNewNabil
Object.keys(listMakeNewNabil).forEach(function (key) {
var markup = '' ;
var i = 0;

listMakeNewNabil[key].MakeNewNabil.forEach(function(element) {

markup += "<tr  data-name='"+element.name+"' data-id='"+element.id+"' data-count='"+element.count+"'><td>"+element.name+"</td><td>"+element.count+"</td><td>"+XButtonForTab+"</td></tr>";

});

         $("#DateAllMakeNewNabilVilges"+key).append(markup);

});
////////////////////////////////////////////SendResourceViliges
Object.keys(listSendResourceViliges).forEach(function (key) {
var markup = '' ;
var i = 0;

listSendResourceViliges[key].SendResourceViliges.forEach(function(element) {

markup += "<tr  data-x='"+element.x+"' data-y='"+element.y+"' data-resmax='"+element.resmax+"' data-maxressend='"+element.MaxResSend+"' ><td>"+element.x+"|"+element.y+"</td><td>"+element.resmax +"</td><td>"+element.MaxResSend +"</td><td>"+XButtonForTab+"</td></tr>";
});

         $("#DateAllSendResourceViligesVilges"+key).append(markup);

});
@if ( \App\RunBots\PermationUser::checkup("scavengebot") ||  \App\RunBots\PermationUser::checkup("scavengeNoPor") )
////////////////////////////////////////////scavenge
Object.keys(listscavenge).forEach(function (key) {
			var i = 0;
			var k = 0;
             ///////////1
             ///////////Attack
             @if (!$newscvange)
  		  $('#datasend'+key+' input[id="spearscavengeA"]')[0].value = listscavenge[key].scavenge[0].spearA ;
          $('#datasend'+key+' input[id="swordscavengeA"]')[0].value  = listscavenge[key].scavenge[0].swordA;
         $('#datasend'+key+' input[id="axescavengeA"]')[0].value  = listscavenge[key].scavenge[0].axeA ;
          $('#datasend'+key+' input[id="archerscavengeA"]')[0].value  = listscavenge[key].scavenge[0].archerA  ; // new
           $('#datasend'+key+' input[id="marcherscavengeA"]')[0].value  = listscavenge[key].scavenge[0].marcherA ; // new
           $('#datasend'+key+' input[id="lightscavengeA"]')[0].value  = listscavenge[key].scavenge[0].lightA ;
          $('#datasend'+key+' input[id="heavyscavengeA"]')[0].value   = listscavenge[key].scavenge[0].heavyA ;
           $('#datasend'+key+' input[id="knightscavengeA"]')[0].value  = listscavenge[key].scavenge[0].knightA ;
           @endif
        ///////////DEF
  		  $('#datasend'+key+' input[id="spearscavengeD"]')[0].value  = listscavenge[key].scavenge[0].spearD;
         $('#datasend'+key+' input[id="swordscavengeD"]')[0].value = listscavenge[key].scavenge[0].swordD ;
         $('#datasend'+key+' input[id="axescavengeD"]')[0].value = listscavenge[key].scavenge[0].axeD;
          $('#datasend'+key+' input[id="archerscavengeD"]')[0].value  = listscavenge[key].scavenge[0].archerD; // new
         $('#datasend'+key+' input[id="marcherscavengeD"]')[0].value  = listscavenge[key].scavenge[0].marcherD ; // new
         $('#datasend'+key+' input[id="lightscavengeD"]')[0].value = listscavenge[key].scavenge[0].lightD ;
         $('#datasend'+key+' input[id="heavyscavengeD"]')[0].value = listscavenge[key].scavenge[0].heavyD;
         $('#datasend'+key+' input[id="knightscavengeD"]')[0].value  = listscavenge[key].scavenge[0].knightD ;

         /////////2
         ///////////Attack
			 i = 1;
             k = 2;
             @if (!$newscvange)
		  $('#datasend'+key+' input[id="spearscavengeA'+k+'"]')[0].value = listscavenge[key].scavenge[i].spearA ;
          $('#datasend'+key+' input[id="swordscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].swordA;
         $('#datasend'+key+' input[id="axescavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].axeA ;
          $('#datasend'+key+' input[id="archerscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].archerA  ; // new
           $('#datasend'+key+' input[id="marcherscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].marcherA ; // new
           $('#datasend'+key+' input[id="lightscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].lightA ;
          $('#datasend'+key+' input[id="heavyscavengeA'+k+'"]')[0].value   = listscavenge[key].scavenge[i].heavyA ;
           $('#datasend'+key+' input[id="knightscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].knightA ;
           @endif
        ///////////DEF
  		  $('#datasend'+key+' input[id="spearscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].spearD;
         $('#datasend'+key+' input[id="swordscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].swordD ;
         $('#datasend'+key+' input[id="axescavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].axeD;
          $('#datasend'+key+' input[id="archerscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].archerD; // new
         $('#datasend'+key+' input[id="marcherscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].marcherD ; // new
         $('#datasend'+key+' input[id="lightscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].lightD ;
         $('#datasend'+key+' input[id="heavyscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].heavyD;
         $('#datasend'+key+' input[id="knightscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].knightD ;
                 /////////3
         ///////////Attack
			 i = 2;
             k = 3;
             @if (!$newscvange)
		  $('#datasend'+key+' input[id="spearscavengeA'+k+'"]')[0].value = listscavenge[key].scavenge[i].spearA ;
          $('#datasend'+key+' input[id="swordscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].swordA;
         $('#datasend'+key+' input[id="axescavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].axeA ;
          $('#datasend'+key+' input[id="archerscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].archerA  ; // new
           $('#datasend'+key+' input[id="marcherscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].marcherA ; // new
           $('#datasend'+key+' input[id="lightscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].lightA ;
          $('#datasend'+key+' input[id="heavyscavengeA'+k+'"]')[0].value   = listscavenge[key].scavenge[i].heavyA ;
           $('#datasend'+key+' input[id="knightscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].knightA ;
           @endif
        ///////////DEF
  		  $('#datasend'+key+' input[id="spearscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].spearD;
         $('#datasend'+key+' input[id="swordscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].swordD ;
         $('#datasend'+key+' input[id="axescavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].axeD;
          $('#datasend'+key+' input[id="archerscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].archerD; // new
         $('#datasend'+key+' input[id="marcherscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].marcherD ; // new
         $('#datasend'+key+' input[id="lightscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].lightD ;
         $('#datasend'+key+' input[id="heavyscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].heavyD;
         $('#datasend'+key+' input[id="knightscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].knightD ;
                 /////////4
         ///////////Attack
			 i = 3;
             k = 4;
             @if (!$newscvange)
		  $('#datasend'+key+' input[id="spearscavengeA'+k+'"]')[0].value = listscavenge[key].scavenge[i].spearA ;
          $('#datasend'+key+' input[id="swordscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].swordA;
         $('#datasend'+key+' input[id="axescavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].axeA ;
          $('#datasend'+key+' input[id="archerscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].archerA  ; // new
           $('#datasend'+key+' input[id="marcherscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].marcherA ; // new
           $('#datasend'+key+' input[id="lightscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].lightA ;
          $('#datasend'+key+' input[id="heavyscavengeA'+k+'"]')[0].value   = listscavenge[key].scavenge[i].heavyA ;
           $('#datasend'+key+' input[id="knightscavengeA'+k+'"]')[0].value  = listscavenge[key].scavenge[i].knightA ;
           @endif
        ///////////DEF
  		  $('#datasend'+key+' input[id="spearscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].spearD;
         $('#datasend'+key+' input[id="swordscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].swordD ;
         $('#datasend'+key+' input[id="axescavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].axeD;
          $('#datasend'+key+' input[id="archerscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].archerD; // new
         $('#datasend'+key+' input[id="marcherscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].marcherD ; // new
         $('#datasend'+key+' input[id="lightscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].lightD ;
         $('#datasend'+key+' input[id="heavyscavengeD'+k+'"]')[0].value = listscavenge[key].scavenge[i].heavyD;
         $('#datasend'+key+' input[id="knightscavengeD'+k+'"]')[0].value  = listscavenge[key].scavenge[i].knightD ;


});
@endif
////////////////////////////////////////////SetException
Object.keys(listSetException).forEach(function (key) {
var markup = '' ;
var i = 0;

listSetException[key].SetException.forEach(function(element) {
    $($('#datasend'+key+' div[id="SetExceptionVillagesworld"]')[0]).css("color","green");

   var out ="Stop Bots : ";

  if ( !element.theftbotrun)
  out += " @lang('Control.Bottheftassistant') ,";

    if ( !element.bildinghelperbotbotrun)
  out += " @lang('Control.BildingHelper') ,";

    if ( !element.autotechupbotrun)
  out += " @lang('Control.Autotechup') ,";

    if ( !element.coinmakerbotrun)
  out += " @lang('Control.coinMaker') ,";

    if ( !element.sendressnobbotrun)
  out += "  @lang('Control.SendResSnob') ,";

    if ( !element.resourcebalancerbotrun)
  out += " @lang('Control.ResourceBalancer') ,";
    if ( !element.makenewnabilbotrun)
  out += " @lang('Control.MakeNewNabil'),";
    if ( !element.scavengebotrun)
  out += " @lang('Control.scavenge') ,";

markup += "<tr  data-name='"+element.name+"' data-id='"+element.id+
"' data-theftbotrun='" +element.theftbotrun+
"' data-bildinghelperbotbotrun='" +element.bildinghelperbotbotrun+
"' data-autotechupbotrun='" +element.autotechupbotrun+
"' data-coinmakerbotrun='" +element.coinmakerbotrun+
"' data-sendressnobbotrun='" +element.sendressnobbotrun+
"' data-resourcebalancerbotrun='" +element.resourcebalancerbotrun+
"' data-makenewnabilbotrun='" +element.makenewnabilbotrun+
"' data-scavengebotrun='" +element.scavengebotrun+
"'><td>"
+element.name+"</td><td>"+out+"</td><td>"+XButtonForTab+"</td></tr>";

});

         $("#DateAllSetExceptionVilges"+key).append(markup);

});
///////////////////////////////////////////

$('[data-toggle="tooltip"]').bstooltip();

});


$('select').selectpicker();
function arraymove(arr, fromIndex, toIndex) {
    var element = arr[fromIndex];
    arr.splice(fromIndex, 1);
    arr.splice(toIndex, 0, element);
}

let translaterword ={
   							main:"@lang('Control.main')",
								barracks:"@lang('Control.barracks')",
								stable:"@lang('Control.stable')",
								garage:"@lang('Control.garage')",
								smith:"@lang('Control.smith')",
								place:"@lang('Control.place')",
								market:"@lang('Control.market')",
								wood:"@lang('Control.wood')",
								stone:"@lang('Control.stone')",
								iron:"@lang('Control.iron')",
								farm:"@lang('Control.farm')",
								storage:"@lang('Control.storage')",
								hide:"@lang('Control.hide')",
								wall:"@lang('Control.wall')",
								statue:"@lang('Control.statue')",
								snob:"@lang('Control.snob')",

}







function updownx (burn) {
    var row = $(burn).closest('tr');
    if ($(burn).hasClass('up'))
      row.prev().before(row);
    else
        row.next().after(row);
};

////////////////////////////////////////////////
{{-- من اجل تعبئة سليكت معين --}}
function SetOptionsSelectBy(idSelect,objectKeyValue , RemoveAllFirst = true)
{

	if ( RemoveAllFirst )
	{

	$($("#"+idSelect).find("option")).remove()
		$("#"+idSelect).selectpicker("refresh");
	}
	for (let index = 0; index < objectKeyValue.length; index++) {

		$("#"+idSelect).append('<option value="'+objectKeyValue[index].key+'" selected="">'+objectKeyValue[index].value+'</option>');

	}
	$("#"+idSelect).selectpicker('val','');
	$("#"+idSelect).selectpicker("refresh");
}
////////////////////////////////////////////////
{{-- من اجل جلب اعادات قرية معينة --}}
function getviligeby(idworld,idvilige)
	{
		for (var i = 0 ; i < listViliges[idworld].length ; i ++)
		{
			if ( listViliges[idworld][i].id == idvilige )
			return listViliges[idworld][i];

		}
		return null;
	}


@endsection
