@extends('layouts.controlp')

@section('AddMoney' , 'active')

@section('content')



<br>

<div id="taskmanger" class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Get My Money</h3>
        </div>
        <p></p>
        <div class="card-body">
            <div class="tab-content">
                <div class="form-group row">

                    <div class="col-sm-9">
                        <div class="form-group">
                            <div class="input-group">Get money value :
                                <input type="number" min="10" @change="moneymax()" v-model="Money" max="10000"
                                    class=" form-control" id="AddMoney"></div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        <div class="input-group">

                            <div class="d-flex flex-row-reverse">
                                <button type="button" v-bind:disabled="!enbBut" class="btn btn-success" @click="Ask">Ask
                                    !</a>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>




@endsection


@section('script')

</script>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>


<script>
    var app = new Vue({
  el: '#taskmanger',
  data:{

            Money:{{$money}},
	        projects:{},
            enbBut : true


  },
  methods: {
    fetchData:function()
    {

           /* axios.
            post("{{route("APIShowAllProjects")}}")
        .then
        (response => {


            this.projects = response.data.data ;
            console.log(	this.projects)
            }).catch((error) => { console.log(error) });*/

    },
    Ask:function()
    {

        var data = {"moeny":this.Money};
		axios.
        post("{{route("AskMoneyFreel")}}",data)
        .then
        (response => {
            $.alert({
                            title: 'Ask Sended ',
                        content: "Your request has been added",
                            }
            )

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

        var bntname = $('#AddNow');
        //  bntname.prop("disabled",true);



    },
    moneymax :function(){
        let nuber =   Number.parseInt(this.Money);
        if ( ! ( Number.isInteger(nuber) && nuber>=10 && nuber <= 10000))
        this.Money = 10;

    }


	},
	filters: {
        ConvertTostringTime:function (value)
        {
            if ( value ==null  || value == 0)
            return "";
           return new Date(value*1000).toLocaleString()

        }

	},
	watch: {

  },
  mounted () {
	this.fetchData();
	//	setInterval(this.fetchData, 3000)

  }

})
</script>

@endsection
