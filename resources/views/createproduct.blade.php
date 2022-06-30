@extends('admin.app')
@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Create Product Name</div>


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
                    <form action="{{ route('creatporuct') }}" method="POST">
                        @csrf
                        <label for="">Product Name</label>
                        <input required class="form-control" type="text" placeholder="Create Product Name" name="name"><br>
                        <input type="submit" value="Create" class="btn btn-primary">

                    </form>

                </div>
            </div>
        </div><br>
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productnames as $key=>$productname)
                <tr>

                    <td> {{ $productname->name }} </td>
                    <td> <a href="pds/{{ $productname->id }}" class="btn btn-danger">Delete</a> </td>
                </tr>

                @endforeach

            </tbody>

        </table>
        <div class="d-flex justify-content-center">
            {!! $productnames->links() !!}
        </div>

    </main>
    <!--end page main-->
@endsection
