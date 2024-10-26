<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="<?= asset('plugins/bootstrap-5.2/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo/himsi.ico') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<style>
    @media (max-width: 374px) {
        .nav-item img {
            width: 23px;
            height: auto;
        }
    }

    .nav-link {
        font-size: 16px;
    }

    @media (max-width: 767.98px) {
        .nav-link {
            font-size: 14.9px;
        }
    }

    @media (max-width: 424px) {
        .nav-link {
            font-size: 11.7px;
        }
    }

    @media (max-width: 374px) {
        .nav-link {
            font-size: 9.1px;
        }
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        font-family: 'Arial', sans-serif;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .table th {
        background-color: #ffffff;
        color: #000;
        text-align: center;
    }

    .table tr:hover {
        background-color: #e0e0e0;
    }

    .text-center {
        text-align: center;
    }
</style>

<body>

    {{ $slot }}

    <script src="<?= asset('plugins/bootstrap-5.2/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>
