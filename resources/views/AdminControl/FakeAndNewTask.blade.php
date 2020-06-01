@extends('layouts.controlp') @section('content')



@section('FakeAddNewTask' , 'active')
<Br>
<div id="taskmanger">
	<div class="col-lg-12">
		<div class="card">

			<div class="card-header d-flex align-items-center">
				<h3 class="h4 whitefont  ">@lang("control.FakeAddNewTask")</h3>
			</div>
			<p></p>
			<div class="card-body">
				<form action='#' class="form-horizontal" id='adduser'>
					@csrf
					<div class="row">
						<label class="col-sm-3 form-control-label">@lang("control.AddTask")</label>
						<div class="col-sm-9">
							<div class="form-group-material">
								<input v-model.number="countofacounts" id="number" type="number" name="@lang("control.countofaocunt")"
								 class="input-material"> <label for="number"
									class="label-material">@lang("control.countofaocunt")</label>
							</div>
							<div class="form-group-material">
									<input v-model="codeserver" id="servercode" type="text" name="@lang("control.countofaocunt")"
									 class="input-material"> <label for="servercode"
										class="label-material">@lang("control.servercode")</label>
										
	
							</div>
							<div class="form-group-material">  
									<input class="form-check-input" type="checkbox" value="" style="
							transform: scale(1.5);" id="EmailConfing">
									<label class="form-check-label" for="EmailConfing">
											@lang("control.EmailconfingMode")
									</label>
							</div>
						


							<div class="form-group-material" v-for="item ,index in codeserverarray" v-bind:key="index" >

							<label for="Status">@lang("control.direction"):@{{item}}</label>
								<select v-model="dirction[index]" id='selectType' class="form-control input-material"
									id="direction" required>
									<option value="ne">@lang("control.northeast")</option>
									<option value="nw">@lang("control.northwest")</option>
									<option value="sw">@lang("control.southwestern")</option>
									<option value="se">@lang("control.southeast")</option>
								</select>

							</div>
							<div class="form-group-material">

								<div class="form-group-material">
									<button v-on:click="Addtask" id="addTask" type="button" name="addTask"
										class="btn btn-primary">@lang("control.addTask")</button>
								</div>
							</div>

						</div>

					</div>
				</form>

			</div>
		</div>
	</div>


	<div class="col-lg-12">
		<div class="card">


			<div class="card-header d-flex align-items-center">
				<h3 class="h4 whitefont  ">@lang("control.AddEmailsForFakeAttak")</h3>
			</div>

			<div class="card-body">

				<table class="table  table-responsive-md table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">@lang("control.count")</th>
							<th scope="col">@lang("control.countend")</th>
							<th scope="col">@lang("control.world")</th>
							<th scope="col">@lang("control.dirction")</th>
							<th scope="col">@lang("control.end")</th>
							<th scope="col">@lang("control.events")</th>
						</tr>
					</thead>
					<tbody>
						<span v-if="datatable!=null && datatable.length >0" >
						<tr  v-for="item ,index in datatable" v-if="!item.hidex"  v-bind:item="item"
								v-bind:index="index"
								v-bind:key="item.id">
						
							<th scope="row">@{{index+1}}</th>
							<td>@{{item.count}}</td>
							<td>@{{item.firtig}}</td>
							<td>@{{item.worldlink | convertWorldDeriction }}</td>
							<td>@{{item.dirction | convertWorldDeriction}}</td>
							<td>@{{item.end | convertTrue_false}}</td> 
							<td><button v-on:click="removetask($event, index)" type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button></td>
							
							
						</tr>
					</span>
					</tbody>
				</table>




			</div>
		</div>
	</div>
</div>

@section('script')
@endsection
</script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>


<script>
	



	var app = new Vue({
  el: '#taskmanger',
  data: {
	countofacounts: "",
	codeserver: "",
	codeserverarray: [],
	dirction: [],
	emailconfing:false,
	datatable:[	/*{
					id:0,
					worldlink:"ae55",
					count:0,
					namevilge:"",
					dirction:"sw",
					decrptionsprofile:"",
					firtig:0,
					end:false,
					emailconfing:false
				}*/
			]
  },
  methods: {
	  Addtask:function(){
		if ( this.countofacounts <=0)
			return;
		if ( this.codeserverarray.length ==0)
		return ;

		for (let index = 0; index < this.dirction.length; index++) {
			if ( this.dirction[index]=="")
			return;
			
		}



		this.datatable.unshift({
					id:0,
					worldlink:this.codeserverarray,
					count:this.countofacounts,
					namevilge:this.codeserver,
					dirction:this.dirction,
					hidex:false,
					decrptionsprofile:"",
					firtig:0,
					end:false,
					emailconfing:this.emailconfing
				});

		axios.
		put('/api/FakeAccountsgetallsettings', {count:  this.countofacounts ,codeserver:this.codeserverarray, dirction: this.dirction , emailconfing:this.emailconfing })
			.then
			(response => {
				this.fetchData();
				}).catch((error) => { 	this.fetchData(); });

		  this.countofacounts = "";
			this.codeserver = "";
			this.dirction =[];
			this.emailconfing = false;
	  },
	  removetask:function (evnet , index)
	  {
		let id = this.datatable[index].id;
		this.datatable[index].hidex = true;

	
		axios.
		delete('/api/FakeAccountsgetallsettings?id='+id)
			.then
			(response => {
				
				if (  response.data.error )
				this.datatable[index].hidex = false;
				else{
				this.datatable.splice(index, 1);

				//this.fetchData();
				}
				

				}).catch((error) => { 	this.datatable[index].hidex = false; this.fetchData();});
			
			

	  },
	  fetchData:function()
	  {

		axios.
	get('/api/FakeAccountsgetallsettings')
	.then
	(response => {
		for (let index = 0; index < response.data.length; index++) {
		 response.data[index].hidex=false;;
			
		}
		
		this.datatable = response.data
		})

	  }
	},
	filters: {
	convertWorldDeriction: function (value) {

		if (Array.isArray(value) )
		{
			let $out = "";
				for (let index = 0; index < value.length; index++) {
					
					switch (value[index]) {
						case "ne":
						$out +=  "@lang("control.northeast") ";
						break;
						case "nw":
						$out +=   "@lang("control.northwest") ";
						break;
						case "sw":
						$out +=   "@lang("control.southwestern") ";
						break;
						case "se":
						$out +=   "@lang("control.southeast") ";
						break;
					default:
					$out +=  value[index]+" ";
					break;
						
					}

				}
				return $out ;
		}
				
			},
			convertTrue_false:function (value) {
			if ( value===true)
			return "@lang("control.end")";
			else
			return "@lang("control.notyat")";
			},
	},
	watch: {
		codeserver: function (val) {
			this.codeserverarray=	val.split(" ");
		for (let index =  this.codeserverarray.length-1 ; index >= 0; index--) {

					if (  this.codeserverarray[index].indexOf("{{env("servercode")}}")===-1)
						{	this.codeserverarray.splice(index, 1);
					
						}
						
		}
				
		if( this.codeserverarray.length > this.dirction.length)
			this.dirction.push("");

    }
  },
  mounted () {
	this.fetchData();
		setInterval(this.fetchData, 3000)
 
  }

})
</script>

@endsection