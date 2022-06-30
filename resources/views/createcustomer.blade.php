@extends('admin.app')
@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Create Customer Name</div>


        </div>
        <!--end breadcrumb-->
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}

            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    <form action="{{ route('createcustomerpost') }}" method="POST">
                        @csrf
                        <label for="">Customer Name</label>
                        <input required class="form-control" type="text" placeholder="Create Customer Name"
                            name="name"><br>
                        Address
                        <textarea required class="form-control" name="address" id="" cols="30" rows="5"></textarea><br>
                        <input type="submit" value="Create" class="btn btn-primary">

                    </form>

                </div>
            </div>
        </div><br>
        <div class="card card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td> {{ $customer->name }} </td>
                            <td> {{ $customer->address }} </td>
                            <td> <a href="cus/{{ $customer->id }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="d-flex justify-content-center">
                {!! $customers->links() !!}
            </div>
        </div>


    </main>
    <!--end page main-->
@endsection
