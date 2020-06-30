@extends('layouts.controlp')
@section('ShowAllProjects' , 'active')
@section('content')
<br>
<div id="taskmanger" class="col-lg-12">
    <div class="card">


        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Show All Projects</h3>
        </div>

        <div class="card-body">

            <table class="table  table-responsive-md table-striped">
                <thead>
                    <tr>

                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Freelancer</th>
                        <th scope="col">Cost</th>
                        <th scope="col">finish</th>
                        <th scope="col">Events</th>


                    </tr>
                </thead>
                <tbody>
                    <span>
                        <tr v-for="project in projects" :key="project.id">
                            <td>@{{project.id}}</td>
                            <td>@{{project.name  }}</td>
                            <td>@{{project.user.name+ " " + project.user.lastname  }}</td>
                            <td> @{{project.freelancer | GetNameFreelancer}}</td>
                            <td> @{{project.cost}}</td>
                            <td> @{{project.isfinsh | isfinish}}</td>
                            <td>
                                <div class="input-group-prepend">
                                    <button data-toggle="dropdown" type="button"
                                        class="btn btn-primary dropdown-toggle">Action <span
                                            class="caret"></span></button>
                                    <div class="dropdown-menu"><a @click="Login(project)" class="dropdown-item">Login
                                            To user</a>
                                        <a v-if="project.freelancer !=null" @click="Login(project)"
                                            class="dropdown-item">Login To freelancer</a>
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
	projects:{},
  },
  methods: {

	  fetchData:function()
	  {

		axios.
        post("{{route("APIShowAllProjects")}}")
	.then
	(response => {


		this.projects = response.data.data ;
        console.log(	this.projects)
		}).catch((error) => { console.log(error) });

	  },
      Login:function(project )
      {
        var iduser = project.user.id;
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


    },
      LoginFreelancer:function(project )
      {
          if (project.freelancer == null)
          $.alert({
            title:"An Error",
            content : "The project have't freelancer"

          })

        var iduser = project.freelancer.id;
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
        isfinish:function(value)
        {
            if ( value )
            return "Yes";
            return "No";

        },
        GetNameFreelancer:function(value)
        {
          if ( value == null)
          return "No freelancer"
          return value.name;

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
