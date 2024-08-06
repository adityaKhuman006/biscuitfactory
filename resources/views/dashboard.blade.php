<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    {{-- @Include('layout.css') --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- Injected CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        .loader-parent {
            position: fixed;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #0000003d;
            z-index: 9999;
        }

        .loader {
            border: 7px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 46px;
            height: 46px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="loader-parent" id="loader">
        <div class="loader"></div>
    </div>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand brand-logo" href="{{ route('index') }}"><img src="" alt="logo" /></a>
                <a class="navbar-brand brand-logo-white" href="{{ route('index') }}"><img
                        src="../../../assets/images/logo-whiddddte.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('index') }}"><img
                        src="../../../assets/images/logo-mini.ddddsvg" alt="logo" /></a>
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                </button>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav navbar-nav-right">
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                {{-- @if (Route::currentRouteName() == 'admin') --}}
                <li class="nav-item {{ Route::currentRouteName() == 'admin' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin') }}">
                        <i class="mdi mdi-account menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if (Route::currentRouteName() == 'production' || Route::currentRouteName() == 'admin') --}}
                <li class="nav-item {{ Route::currentRouteName() == 'production' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('production') }}">
                        <i class="mdi mdi-chart-line menu-icon"></i>
                        <span class="menu-title">Production</span>
                    </a>
                </li>
                {{-- @endif --}}
                {{-- @if (Route::currentRouteName() == 'rep' || Route::currentRouteName() == 'admin') --}}
                <li class="nav-item {{ Route::currentRouteName() == 'rep' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('rep') }}">
                        <i class="mdi mdi-layers menu-icon"></i>
                        <span class="menu-title">Report</span>
                    </a>
                </li>
                {{-- @endif --}}
                <li class="nav-item {{ Route::currentRouteName() == 'security' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('security') }}">
                        <i class="mdi mdi-layers menu-icon"></i>
                        <span class="menu-title">Security</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Masters</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="#">Order</a></li>

                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
