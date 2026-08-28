<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .regin-page {
            min-height: 100vh;
            background:
                linear-gradient(rgba(23, 37, 54, 0.65), rgba(23, 37, 54, 0.65)),
                url('/img/hero-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .regin-card {
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 15px;
        }

        .regin-card h1 {
            color: #172536;
        }

        .regin-card label {
            color: #1D2935;
        }

        .regin-card .form-control {
            border: 1px solid #D7E0E7;
        }

        .regin-card .form-control:focus {
            border-color: #526F82;
            box-shadow: 0 0 0 0.2rem rgba(127, 168, 201, 0.25);
        }

        .regin-card .btn-primary {
            background-color: #526F82;
            border-color: #526F82;
        }

        .regin-card .btn-primary:hover {
            background-color: #405B6C;
            border-color: #405B6C;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    @yield('content')

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
