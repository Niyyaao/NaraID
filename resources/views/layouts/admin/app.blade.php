<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    @vite(['resources/sass/app.scss', 'resources/css/main.css', 'resources/js/main.js', 'resources/js/app.js'])

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        /* admin page */
        .admin-page-title {
            color: var(--heading-color);
        }

        /* card */
        .admin-card {
            background-color: var(--surface-color);
            border:  1px solid var(--border-color);
            border-radius: 8px;
        }

        .admin-card .table {
            color: var(--default-color);
        }

        .admin-card .table thead th {
            color: var(--heading-color);
            border-bottom: 2px solid var(--border-color);
        }

        .admin-card .table td {
            border-color: var(--border-color)
        }

        /* form */
        .admin-form-card {
            width: 600px;
            padding: 20px;
            background-color: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
        }

        .admin-form-group {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .admin-form-group label {
            width: 180px;
            margin-top: 7px;
            margin-bottom: 0;
            color: var(--default-color);
            font-weight: 500;
            flex-shrink: 0;
        }

        .admin-form-input {
            width: 350px;
        }

        .admin-form-input input,
        .admin-form-input textarea {
            width: 100%;
            padding: 5px 8px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            background-color: #FFFFFF;
            color: var(--default-color);
        }

        .admin-form-input textarea {
            height: 60px;
            resize: none;
        }

        .admin-form-input input:focus,
        .admin-form-input textarea:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        .admin-form-input input[type="file"] {
            width: 100%;
        }

        /* detail */

        .admin-detail-card {
            max-width: 700px;
            background-color: transparent;
        }

        .admin-detail-row {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .admin-detail-row label {
            width: 200px;
            margin-bottom: 0;
            color: var(--default-color);
            font-weight: 500;
            flex-shrink: 0;
        }

        .admin-detail-row input {
            width: 300px;
            padding: 6px 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            background-color: #FFFFFF;
            color: var(--default-color);
        }

        .admin-detail-row input[readonly] {
            border: none;
            background-color: transparent;
            padding: 6px 0;
            color: var(--default-color);
        }

        /* button */

        .admin-actions {
            display: flex;
            gap: 18px;
            margin-top: 12px;
        }

        .admin-actions .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .admin-actions .btn-primary:hover {
            background-color: #405B6C;
            border-color: #405B6C;
        }

        .admin-action .btn-danger {
            background-color: #B85C5C;
            border-color: #B85C5C;
        }

        /* table action */

        .admin-action {
            text-decoration: none;
        }

        .admin-action-view {
            color: var(--accent-color);
        }

        .admin-action-edit {
            color: var(--accent-color);
        }

        .admin-action-delete {
            color: #B85C5C;
        }

        .admin-action:hover {
            opacity: 0.75;
        }

    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('styles')

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.admin.inc.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.admin.inc.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.admin.inc.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    @stack('scripts')

</body>

</html>
