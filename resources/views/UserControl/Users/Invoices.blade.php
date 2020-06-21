@extends('layouts.controlp')

@section('Invoices' , 'active')

@section('content')



<br>

<div class="col-lg-12">
    <div class="card">

        <div class="card-header d-flex align-items-center">
            <h3 class="h4 whitefont  ">Invoice Item</h3>
        </div>

        <div class="card-body">

            <table class="table  table-responsive-md table-striped">
                <thead>
                    <tr>

                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Cost</th>
                        <th scope="col">See More </a></th>
                    </tr>
                </thead>
                <tbody>
                    <span>
                        @foreach ( $itemsInvoice as $Invoice )
                        <tr>
                            <td>{{$Invoice->id}}</td>
                            <td>{{$Invoice->Name}}</td>
                            <td>{{$Invoice->Cost}}</td>
                            <td><a href="{{route("itemInvoices")}}/{{$Invoice->id}}"></td>
                        </tr>
                        @endforeach
                    </span>
                </tbody>
            </table>




        </div>
    </div>
</div>



@endsection


@section('script')

</script>



<script>
    @endsection
