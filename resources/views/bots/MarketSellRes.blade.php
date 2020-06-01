@section('scriptGetToSaveInMarketSellRes') 

var MarketSellRes = JSON.parse( '{"MarketSellRes":[] , "run" :'+$('#datasend'+id+' input[id="MarketSellResRun"]')[0].checked+'}' );
     listMarketSellRes[id] = MarketSellRes;
var z = id ;
var table =$('#datasend'+id+' tbody[id="DateAllMarketSellResVilges"]')[0] ; 
    $('tr' , table).each(function (a, b ) {
        var name =      $(this).data('name');
        var id =        $(this).data('id');
        var wood =      $(this).data('wood');
        var stone =     $(this).data('stone');
        var iron =      $(this).data('iron');
        var maxavergesell =     $(this).data('maxavergesell');
        listMarketSellRes[z].MarketSellRes.push({ name: name, id: id, wood: wood  , stone: stone , iron: iron  , maxavergesell: maxavergesell});

       
    }  );

$('#datasend'+id+' input[id="AlldataMarketSellRes"]').val(JSON.stringify(listMarketSellRes[id]));
console.log(listMarketSellRes);
   

@endsection 

@section('scriptAddTofileMarketSellResVilges') 
function AddTofileMarketSellResVilges(butte)
{
var id = $($(butte).closest("form")).data('id');
var table =$('#datasend'+id+' tbody[id="DateAllMarketSellResVilges"]')[0] ; 
                    console.log(table);
      if (
       Number.isInteger(parseInt( $('#datasend'+id+' input[id="MarketSellReswood"]').val())) && 
       Number.isInteger(parseInt( $('#datasend'+id+' input[id="MarketSellResiron"]').val()))&& 
       Number.isInteger(parseInt( $('#datasend'+id+' input[id="MarketSellResMaxAvergeSell"]').val()))&&
       Number.isInteger(parseInt( $('#datasend'+id+' input[id="MarketSellResstone"]').val())) )
    { 
         console.log(id);
     var  markup = "<tr  data-id='"+$('#datasend'+id+' select[id="namevileg7"]').val()+"' data-name='"
     +$('#datasend'+id+' select[id="namevileg7"] option:selected')[0].innerHTML+"' data-wood='"
     +$('#datasend'+id+' input[id="MarketSellReswood"]')[0].value +"' data-stone='"
     +$('#datasend'+id+' input[id="MarketSellResstone"]')[0].value +"' data-iron='"
     +$('#datasend'+id+' input[id="MarketSellResiron"]')[0].value +"' data-maxavergesell='"
     +$('#datasend'+id+' input[id="MarketSellResMaxAvergeSell"]')[0].value +"' ><td>"
     +$('#datasend'+id+' select[id="namevileg7"] option:selected')[0].innerHTML+"</td><td>"
     +$('#datasend'+id+' input[id="MarketSellReswood"]')[0].value +"</td><td>"
     +$('#datasend'+id+' input[id="MarketSellResstone"]')[0].value +"</td><td>"
     +$('#datasend'+id+' input[id="MarketSellResiron"]')[0].value +"</td><td>"
     +$('#datasend'+id+' input[id="MarketSellResMaxAvergeSell"]')[0].value 
 
     +"</td><td>"+XButtonForTab+"</td></tr>";
               $(table).append(markup);
      }
   
}  
@endsection 
@section('MarketSellReskeys') 

Object.keys(listMarketSellRes).forEach(function (key) {
var markup = '' ;
var i = 0;

$($('#datasend'+key+' input[id="MarketSellResRun"]')[0]).prop('checked', listMarketSellRes[key].run).change()

listMarketSellRes[key].MarketSellRes.forEach(function(element) {

markup += "<tr  data-name='"+element.name+"' data-id='"+element.id+"' data-wood='"+element.wood+"' data-iron='"+element.iron+"' data-stone='"+element.stone+"'  data-maxavergesell='"+element.maxavergesell+"' ><td>"+element.name+"</td><td>"+element.wood+"</td><td>"+element.stone+"</td><td>"+element.iron+"</td><td>"+element.maxavergesell+"</td><td>"+XButtonForTab+"</td></tr>";

});
$($('#datasend'+key+' tbody[id="DateAllMarketSellResVilges"]')[0]).append(markup) ; 
        
       
});
@endsection
@section('MarketSellResHtml') 
                
                
                <div style="display: none;" id='MarketSellResform' >
                  <div class="form-group col-md-3 ">
                            <input type="checkbox" id='MarketSellResRun' value='1' data-toggle="toggle" data-on="Run" data-off="Off">
                 			  </div>
                  <div class="form-group row" >
                  <h1></h1>
                          <label class="col-sm-3 form-control-label">@lang('control.Settings')</label>
                          <div class="col-sm-9">
                            <div class="row">
                            
                               <div class="form-group col-md-9 col-sm-9">
                            <select id='namevileg7' class="form-control">
                            @if ($Viligname!= null)
                           @foreach ($Viligname as $name )
                          	 @if (isset($name->name))
                              <option value='{{$name->id}}'>{{$name->name}}</option>
                     			 @endif
                              @endforeach
                              @else
                              <option value='0'>@lang('control.Empty')</option>
                              @endif
                            </select>
                            
                       	 		
                       	 			  <div class="input-group"> 
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon">@lang('control.wood')
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='MarketSellReswood'  max="999999"    data-toggle="tooltip"  title="@lang('control.MarketSellResWoodtTitel')" placeholder="@lang('control.MarketSellResWood')" class="form-control">
                            		  </div>
                            		  <div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon">@lang('control.stone')
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='MarketSellResstone'  max="999999"    data-toggle="tooltip"  title="@lang('control.MarketSellResstoneTitel')" placeholder="@lang('control.MarketSellResstone')" class="form-control">
                            		  </div>
                            		      <div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon">@lang('control.iron')
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='MarketSellResiron'  max="999999"    data-toggle="tooltip"  title="@lang('control.MarketSellResIrontTitel')" placeholder="@lang('control.MarketSellResIron')" class="form-control">
                            		  </div>
                            		    <div class="input-group">
                               			<div class="input-group-prepend">
                                 			 <div class="input-group-text" id="btnGroupAddon">@lang('control.MaxAvergesell')
                                 			 </div>
                               			</div>
                               			 <input type="number" min="0"  id ='MarketSellResMaxAvergeSell'  max="999999"    data-toggle="tooltip"  title="@lang('control.MarketSellResMaxAvergeSelltTitel')" placeholder="@lang('control.MarketSellResMaxAvergeSell')" class="form-control">
                            		  </div>
                               </div>
                 			  	
                            </div> 
                           <div class="form-group col-md-2  col-sm-3  ">
                          <input type="button"  onclick="AddTofileMarketSellResVilges(this)" value="Add" class="form-control  btn-primary btn ">
                          </div> 
                 			</div>  
                 			<!-- Tab -->
                 		<table class="table ">
                          <thead>
                            <tr>
                              <th>@lang('control.name')</th>
                                <th>@lang('control.wood')</th>
                                <th>@lang('control.stone')</th>
                                <th>@lang('control.iron')</th>
                                <th>@lang('control.AVRMAX')</th>
                              <th>@lang('control.Event')</th>
                            </tr>
                          </thead>   
                          <tbody id="DateAllMarketSellResVilges">
                          <!-- Data-->
                          </tbody>
                        </table>
                 			<!--  Tab -->
                 			   </div>   
						       </div></div>
          				   
 @endsection           
