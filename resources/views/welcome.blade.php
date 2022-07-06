<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    {{-- <link rel="icon" href="http://raj.connectbangladeshint.org/assets/images/favicon-32x32.png" type="image/png" /> --}}

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />

    <title>Login form</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card col-md-5">
                    <div style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;" class="card card-body p-4 p-sm-5">

                        <center>
                            <img style="width: 80px" src="{{ asset('assets/images/logo-icon1.png') }}" alt="">

                        </center>
                        <h6 class="text-center mt-1"><b>MAQ PAPER USER LOGIN</b> </h6>


                        <form class="form-body" method="POST" action="{{ route('loginpost') }}">
                            @csrf


                            <div class="login-separater text-center mb-4">

                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="ms-auto position-relative">
                                        <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                            <img style="width: 35px;margin-left:-10px"
                                                src="{{ asset('assets/images/usr.jpg') }}" alt="">
                                        </div>
                                        <input type="email" name="email" class="form-control radius-30 ps-5"
                                            id="inputEmailAddress" placeholder="User / Email">
                                    </div>
                                </div>
                                <div class="col-12">

                                    <div class="ms-auto position-relative">
                                        <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                            <img style="width: 25px;margin-left:-8px"
                                                src="{{ asset('assets/images/pas.png') }}" alt="">
                                        </div>
                                        <input type="password" name="password" class="form-control radius-30 ps-5"
                                            id="inputChoosePassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-6">

                                </div>
                                <div class="col-6 text-end">
                                </div>
                                <div class="col-12">

                                    <center><button style="padding-left: 20px;padding-right: 20px" type="submit" class="btn btn-primary text-center"><b>LOGIN</b> </button></center>

                                </div>
                                <br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    {{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/pace.min.js') }}"></script> --}}


</body>

</html>
