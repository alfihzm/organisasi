<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo/himsi.ico') }}">
    <title>HIMSI</title>
    <!-- Custom CSS -->
    <link href="{{ asset('template/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<style>
    /* Untuk Chrome, Safari, Edge, dan Opera */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Untuk Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background: url('{{ asset('template/assets/images/big/auth-bg4.jpg') }}') no-repeat center center; background-size: cover;">
            <div class="auth-box row justify-content-center" style="box-shadow: none;">
                <div class="col-lg-8 col-md-7 bg-white border border-secondary rounded-1 shadow-lg"
                    style="box-shadow: none;">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{ asset('img/logo/himsi.webp') }}" height="64">
                        </div>
                        <h2 class="mt-3 text-center text-primary">LOGIN</h2>
                        <p class="text-center">Fitur ini dikhususkan untuk peserta open recruitment 2024 HIMSI</p>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mt-2">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form action="/auth/login" method="POST" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="NIM">NIM</label>
                                        <input class="form-control" id="NIM" name="NIM"
                                            value="{{ old('NIM') }}" type="number" placeholder="Masukkan NIM">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">Password</label>
                                        <input class="form-control" id="password" type="password" name="password"
                                            placeholder="Password default no. whatsapp">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-primary mb-3"
                                        style="border-radius: 4px">Login
                                    </button>
                                    <a class="text-primary" href="/"> Kembali </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('template/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert-dismissible").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>

</html>
