@extends('admin.app')
@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"></div>


        </div>
        <hr>
        <!--end breadcrumb-->
        <div class="text-center mb-3">
            <a href="{{ route('productcreate') }}" class="btn btn-success">Create Product Name </a>
            <a href="{{ route('createcustomer') }}" class="btn btn-primary">Create Customer Name</a>

        </div>
        <div class="card card-body">
            <h1 class="text-center"> Stock </h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Weight</th>
                        <th>Date&Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $key => $value)
                        <tr>
                            <td> {{ ++$i }} </td>
                            <td> {{ $value->productID }} </td>
                            <td> {{ $value->productname }} </td>
                            <td> {{ $value->size }} </td>
                            <td> {{ $value->weight }} </td>
                            <td> {{ $value->created_at }} </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th><b>Total</b> </th>
                        <th></th>
                        <th>{{ $tatal }} KG</th>
                        <th></th>

                    </tr>
                </tfoot>
            </table>
            <div class="d-flex justify-content-center">
                {!! $stocks->links() !!}
            </div>

        </div><br>
        <div class="row">

            {{-- Daywise Stock Report --}}
            <div class=" col-md-6">
                <div class="card card-body">
                    <h2 class="text-center">Daywise Stock Report</h2>

                    <table class="table table-bordered">
                        <thead class="">
                            <tr>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>OPNING</td>
                                <td><b> {{$opting}}  KG</b> </td>
                            </tr>
                            <tr>
                                <td>PRODUCTION</td>
                                <td> <b>{{ $todayProductionSum }} KG</b> </td>

                            </tr>
                            <tr>
                                <td>DELIVERY</td>
                                <td> <b>{{ $todayDeliveryWeight }} KG</b> </td>
                            </tr>
                            <tr>
                                <td>BALANCE</td>
                                <td>  <b>{{ $tatal }} KG</b></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class=" col-md-6">

                <div class="card card-body">
                    <h2 class="text-center">Daywise Delvery Report</h2>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Weigth</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deliverys as $key => $value)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $value->name }} </td>
                                    <td> {{ $value->weight }} </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center" colspan="2"><b>Total</b> </td>
                                <td><b>{{$todayDeliveryWeight}} </b> </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <br>



    </main>
    <!--end page main-->
@endsection
