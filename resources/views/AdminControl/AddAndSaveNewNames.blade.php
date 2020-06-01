@extends('layouts.controlp') @section('content')



@section('AddAndSaveNewNames' , 'active')
<Br>
<div id="taskmanger">
	<div class="col-lg-12">
		<div class="card">

			<div class="card-header d-flex align-items-center">
				<h3 class="h4 whitefont  ">@lang("Control.AddNewNameFromServers")</h3>
			</div>
			<p></p>
			<div class="card-body">
				<form action='#' class="form-horizontal" id='adduser'>
					@csrf
					<div class="row">
						<label class="col-sm-3 form-control-label">@lang("Control.UrlToGetnames")</label>
						<div class="col-sm-9">
							<div class="form-group-material">
									<input v-model="urlserver" id="urlserver" type="text" name="@lang("Control.urlserver")"
									 class="input-material"> <label for="urlserver"
										class="label-material">https://en110.tribalwars.net</label>


							</div>



							<div class="form-group-material">

								<div class="form-group-material">
									<button v-on:click="Addtask" id="addTask" type="button" name="addTask"
										class="btn btn-primary">@lang("Control.StartScan")</button>
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
				<h3 class="h4 whitefont  ">@lang("Control.InfoNames")</h3>
			</div>

			<div class="card-body">

				<table class="table  table-responsive-md table-striped">
					<thead>
						<tr>

							<th scope="col">@lang("Control.CountOfNames")</th>
                            <th scope="col">@lang("Control.LastScan")</th>
                            <th scope="col">@lang("Control.LastAddingWorlds")</th>
                            <th scope="col">@lang("Control.NamesOfWorld")</th>
						</tr>
					</thead>
					<tbody>
						<span >
						<tr >
							<td>@{{datatable.count}}</td>
							<td>@{{datatable.LastScan|ConvertTostringTime}}</td>
							<td >@{{datatable.LastAddingWorlds | ConvertTostringTime }}</td>
							<td > @{{datatable.NamesOfWorld | ConvertArrayTostring}}</td>
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
	urlserver: "",
	codeserverarray: [],
	dirction: [],
	emailconfing:false,
	datatable:{},
  },
  methods: {
	  Addtask:function(){
		if ( this.urlserver.length ==0 )
		return ;

/*
                            <td>@{{datatable.count}}</td>
							<td>@{{datatable.LastScan}}</td>
							<td>@{{datatable.LastAddingWorlds  }}</td>
							<td>@{{datatable.NumberOfworldsScan | convertWorldDeriction}}</td>
							<td>@{{datatable.NamesOfWorld | convertTrue_false}}</td>*/

		this.datatable.count++;
        if ( this.datatable.hasOwnProperty("NamesOfWorld"))
        this.datatable.NamesOfWorld.push(this.urlserver);
        else
        {
            this.datatable.NamesOfWorld = [];
            this.datatable.NamesOfWorld.push(this.urlserver);

        }
        this.datatable.LastAddingWorlds = Math.round((new Date()).getTime() / 1000);


		axios.
		put('/api/AddNewNamesForNamesAccounts', { urlserver:this.urlserver })
			.then
			(response => {
				this.fetchData();
				}).catch((error) => { 	this.fetchData(); });

		  this.urlserver = "";
	  },
	  fetchData:function()
	  {

		axios.
	get('/api/AddNewNamesForNamesAccounts')
	.then
	(response => {


		this.datatable = response.data ;
		}).catch((error) => { console.log(error) });

	  }
	},
	filters: {
        ConvertTostringTime:function (value)
        {
            if ( value ==null  || value == 0)
            return "";
           return new Date(value*1000).toLocaleString()

        },
			ConvertArrayTostring:function (value) {
                strings = "";
               for (const key in value) {
                   if (value.hasOwnProperty(key)) {
                    strings+=  value[key]+",";

                   }
               }
               if (strings.length> 0 )
               strings= strings.substring(0, strings.length - 1);
               return strings;
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
	//	setInterval(this.fetchData, 3000)

  }

})
</script>

@endsection
