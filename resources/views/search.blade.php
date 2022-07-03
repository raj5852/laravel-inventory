@extends('admin.app')
@section('css')
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">


        </div>
        <!--end breadcrumb-->

        <div class="card shadow-sm radius-10 border-0 mb-3">
            <div class="card-body">
                <h2 class="text-center">Customer Delvery Report</h2>
                <hr>
                <a class="btn btn-primary" href="/dashboard">Dashboard</a><br>
                <div class="table table-responsive">
                    <table class="table table-bordered yajra-datatable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Total Weight</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td> {{ $data->name }} </td>
                                <td> {{ $data->weight }} </td>
                                <td> {{ $data->created_at }} </td>
                                <td> <a href="view/{{ $data->id }}" class="btn btn-success" >View</a> </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </main>
    <!--end page main-->
@endsection
@section('js')
@endsection
