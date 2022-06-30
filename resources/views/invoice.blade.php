<!DOCTYPE html>
<html lang="en">
<head>

    <title>QR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></head>
<body>
    <h3 style="text-align: center">{{$name }} </h3>
    <p style="text-align: center"> {{ $address }} </p>
    <hr><hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Weight</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key=>$product)
            <tr>
                <td> {{ $key+1 }} </td>
                <td> {{ $product->productname }} </td>
                <td> {{ $product->weight }} </td>
            </tr>

            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"  class="text-center"> Total </td>
                <td> {{$total}} </td>
            </tr>
        </tfoot>
    </table>
    <p> <b>Date and Time </b>: {{$dateandtime}} </p>
</body>
</html>
