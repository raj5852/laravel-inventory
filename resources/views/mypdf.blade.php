<!DOCTYPE html>
<html lang="en">

<head>

    <title>QR</title>
</head>

<body>
    <p style="text-align: center">{{ $name }} </p>
    <p style="text-align: center">{{ $size }} / {{ $weight }} </p>
    <div class="text-align:center">
        <img style="text-align: center;margin-left:70px;margin-top:-20px"
            src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl={{ $qrcode }}" alt="">
    </div>
    <p style="font-size: 13px; text-align:center">{{$qrcode}} </p>


    <p style="text-align: center"> <b>Date and Time :</b> {{ $dateandtime }} </p>


</body>

</html>
