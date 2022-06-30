@extends('admin.app')
@section('content')
    <!--start content-->
    <main class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product sales</div>


        </div>
        <hr>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-md-7">
                <div class="card card-body p-5">
                    <form action="/sale" method="POST">
                        @csrf
                        <label for=""><b>Customer : </b> </label>
                        <select class="form-control" name="customerid" id="">

                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select><br>
                        <input type="text" id="scan" class="form-control scan" placeholder="Scan QR code">
                        <br><br>
                        <div class="card card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="appendrow">

                                </tbody>


                            </table>
                            <input type="submit" class="btn btn-success" value="Save &amp; Print">

                        </div>
                    </form>

                </div>

            </div>
        </div>


    </main>
    <!--end page main-->
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.scan').on('input', function(e) {


                e.preventDefault();
                var productname = $('.scan').val();
                var i = 0;
                $.ajax({
                    url: '/ajax',
                    method: 'post',
                    data: {
                        productname: productname
                    },
                    success: function(data) {
                        if (data.id) {

                            $('#scan').val(null);
                            $('#appendrow').append(

                                '<tr id="row' + data.productID +
                                '"><input type="hidden" name="id[]" value=' +
                                data.id +
                                '> <td>' +
                                data.productname +
                                '</td><td><button type="button" id=' + data.productID +
                                ' class="btn btn-danger btn-remove">Delete</button></td></tr>'
                            )
                        }

                    }
                })
            })
            $(document).on('click', '.btn-remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();

            })

        })
    </script>
@endsection
