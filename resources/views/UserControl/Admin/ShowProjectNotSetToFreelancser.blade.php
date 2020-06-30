@extends('layouts.controlp')
@section('ShowProjectNotSetToFreelancser' , 'active')
@section('content')
<br>
<div id="taskmanger" class="col-lg-12">
    <div class="card">


        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Show Project Not Set To Freelancser</h3>
        </div>

        <div class="card-body">

            <table class="table  table-responsive-md table-striped">
                <thead>
                    <tr>

                        <th scope="col">Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Money</th>
                        <th scope="col">Money spent</th>
                        <th scope="col">Money Total</th>
                    </tr>
                </thead>
                <tbody>
                    <span>
                        <tr>
                            <td>@{{datatable.count}}</td>
                            <td>@{{datatable.LastScan|ConvertTostringTime}}</td>
                            <td>@{{datatable.LastAddingWorlds | ConvertTostringTime }}</td>
                            <td> @{{datatable.NamesOfWorld | ConvertArrayTostring}}</td>
                        </tr>
                    </span>
                </tbody>
            </table>




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

	  fetchData:function()
	  {

		axios.
	get('/api/user/LogsLogin')
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

    }
  },
  mounted () {
	this.fetchData();
	//	setInterval(this.fetchData, 3000)

  }

})
</script>

@endsection
