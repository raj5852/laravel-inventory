@extends('admin.app')
@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add product</div>


        </div>
        <hr>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-7">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>

                @endif
                <div class="card card-body p-5">
                    <form action="/store" method="POST">
                        @csrf
                        <label for="">Select Product</label>
                        <select required class="form-control" name="product" id="">

                            @foreach ($productnames as $productname)
                                <option value="{{ $productname->name }}">{{ $productname->name }}</option>
                            @endforeach
                        </select>
                        <label for="">Size</label>
                        <input class="form-control" type="number" name="size" placeholder="Size-Inch" required>
                        <label for="">Weight</label>
                        <input class="form-control" type="number" name="weight" placeholder="Weight-KG" required><br>
                        <input type="submit" value="Save &amp; Print" class="btn btn-success">
                    </form>

                </div>
            </div>
        </div>


    </main>
    <!--end page main-->
@endsection
