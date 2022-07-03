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
                <h2 class="text-center">Delvery Report</h2>
                <hr>
                <form action="form-search">

                    <div class="d-flex justify-content-around">
                        <p>Name: <input class="form-control" name="name" type="name" placeholder="Search Name.."></p>
                        <p style="margin-left: 3px">Start Date: <input class="form-control" name="startdate" type="date"
                                id="datepicker1"></p>
                        <p style="margin-left: 3px">End Date: <input class="form-control " name="enddate" type="date"
                                id="datepicker2"></p>

                    </div>
                    <div style="margin-left: 80px">
                        <button type="submit" class="btn btn-primary">Search</button>

                    </div>


                </form>
                <br>

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
                                    <td> <a href="view/{{ $data->id }}" class="btn btn-success">View</a> </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $datas->links() !!}
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!--end page main-->
@endsection
@section('js')
@endsection
