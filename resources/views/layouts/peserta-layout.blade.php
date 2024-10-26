<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $title }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="{{ asset('themeKita/assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('template/dist/css/style.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/himsi.ico') }}">
    <link rel="stylesheet" href="{{ asset('themeKita/assets/css/ready.css') }}">
    <link rel="stylesheet" href="{{ asset('themeKita/assets/css/demo.css') }}">
</head>

<style>
    .alert {
        position: relative;
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .alert .close {
        position: absolute;
        top: 50%;
        right: 1rem;
        transform: translateY(-50%);
        padding: 0.75rem 1.25rem;
        color: inherit;
        background: none;
        border: none;
        cursor: pointer;
    }

    .alert .icon {
        margin-right: 0.75rem;
    }

    .carousel-indicators [data-bs-target] {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #c7c7c775;
        margin: 5px;
        border: none;
    }

    .carousel-indicators .active {
        background-color: #ffffff;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgb(255, 255, 255);
        border-radius: 50%;
        padding: 15px;
        background-size: 10px 10px;
        background-repeat: no-repeat;
        background-position: center;
    }

    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 16 16'%3E%3Cpath d='M11.354 15.354a.5.5 0 0 0 0-.708l-6-6a.5.5 0 0 0 0-.708l6-6a.5.5 0 1 0-.708-.708l-6.5 6.5a.5.5 0 0 0 0 .708l6.5 6.5a.5.5 0 0 0 .708 0z'/%3E%3C/svg%3E");
    }

    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 16 16'%3E%3Cpath d='M4.646 15.354a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 0-.708l-6-6a.5.5 0 1 1 .708-.708l6.5 6.5a.5.5 0 0 1 0 .708l-6.5 6.5a.5.5 0 0 1-.708 0z'/%3E%3C/svg%3E");
    }

    .carousel-control-prev,
    .carousel-control-next {
        background-color: transparent;
        border: none;
        outline: none;
    }

    .carousel-inner {
        position: relative;
        overflow: hidden;
    }

    .carousel-item {
        transition: transform 0.6s ease-in-out;
        will-change: transform;
    }

    .carousel-indicators button {
        background-color: #c7c7c775;
        transition: background-color 0.3s ease;
    }

    .carousel-indicators .active {
        background-color: #ffffff;
    }

    .carousel-indicators {
        position: absolute;
        bottom: 0;
        left: 35%;
        transform: translateX(-50%);
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .row {
            justify-content: center;
        }

        .col-5 {
            margin-left: 15px;
            margin-right: 15px;
        }
    }

    @media (max-width: 767.98px) {
        .carousel-item img {
            width: 100%;
            height: auto;
        }
    }
</style>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="/peserta" class="logo">
                    HIMSI UBSI
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>

            <x-peserta-top-bar></x-peserta-top-bar>
        </div>

        <x-peserta-side-bar></x-peserta-side-bar>
        <div class="main-panel">
            {{ $slot }}
        </div>
    </div>
</body>

<x-peserta-script></x-peserta-script>

<script>
    $(".preloader ").fadeOut();
</script>

</html>
