@extends('layouts.controlp')
@section('ShowAllFreelancser' , 'active')
@section('content')
<br>
<div id="taskmanger" class="col-lg-12">
    <div class="card">


        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Show All Freelancer</h3>
        </div>

        <div class="card-body">

            <table class="table  table-responsive-md table-striped">
                <thead>
                    <tr>

                        <th scope="col">Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Money</th>
                        <th scope="col">Money Payout</th>
                        <th scope="col">Money Total</th>
                        <th scope="col">Events</th>


                    </tr>
                </thead>
                <tbody>
                    <span>
                        <tr v-for="user in users" :key="user.id">
                            <td>@{{user.id}}</td>
                            <td>@{{user.email}}</td>
                            <td>@{{user.money  }}</td>
                            <td> @{{user.moneyspins}}</td>
                            <td> @{{user.money - user.moneyspins }}</td>
                            <td>
                                <div class="input-group-prepend">
                                    <button data-toggle="dropdown" type="button"
                                        class="btn btn-primary dropdown-toggle">Action <span
                                            class="caret"></span></button>
                                    <div class="dropdown-menu"><a @click="Login(user.id)"
                                            class="dropdown-item">Login</a>
                                       <!-- <div class="dropdown-divider"></div> -->
                                    </div>
                                </div>
                            </td>

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
	users:{},
  },
  methods: {

	  fetchData:function()
	  {

		axios.
        post("{{route("APIGetAllFreeLancer")}}")
	.then
	(response => {


		this.users = response.data.data ;
        console.log(	this.users)
		}).catch((error) => { console.log(error) });

	  },
      Login:function(iduser)
      {
        var data = {"id":iduser};
		axios.
        post("{{route("APIAdminLogin")}}",data)
        .then
        (response => {

            window.open(response.data.data,'_blank');

            }).catch((error) => {
                var errors = "";
                if ( "data" in error.response.data)
                    {
                        for (let index = 0; index < error.response.data.data.length; index++) {
                             errors += error.response.data.data[index] +"<br>";

                        }

                    }
                    else
                    errors = "error unknow !"
                $.alert({
                            title: 'An Error ',
                        content: errors,
                            }
            ) });


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
        GetCountProjectActive:function (value) {
            strings =0;
        for (let index = 0; index < value.length; index++) {
            if( !value[index].isfinsh)
            strings++;
        }

        return strings;
        },
        GetStatusUser:function (value) {
            strings =0;
        for (let index = 0; index < value.length; index++) {
            if( !value[index].isfinsh)
            strings++;
        }

        return strings;
        },
        GetCountProjectFinish:function (value) {
            strings =0;
        for (let index = 0; index < value.length; index++) {
            if( value[index].isfinsh)
            strings++;
        }

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
