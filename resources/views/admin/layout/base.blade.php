<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="{{ config('app.url') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta tags -->
    @yield('meta')
    <!-- Main CSS-->
    <title>@yield('titulo') - Admin Lovatel</title>
    <link rel="shortcut icon" href="{{ asset('admin-template/static/images/logo/logo.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin-template/compiled/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('admin-template/compiled/css/app-dark.css')}}">
    <!-- Page links -->
    @yield('pageLinks')
</head>

<body>
    <script src="{{ asset('admin-template/static/js/initTheme.js')}}"></script>
    <div id="app">
        @include('admin.layout.includes.menuLateral')
        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="javascript:;" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <a class="text-gray-600" href="{{ route('admin.logout') }}" title="Sair"><i class="bi bi-door-closed bi-sub fs-4"></i></a>
                    </div>
                </nav>
            </header>

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>@yield('titulo')</h3>
                                <p class="text-subtitle text-muted">@yield('descricao')</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        @yield('caminho')
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        @yield('conteudo')
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin-template/extensions/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin-template/static/js/components/dark.js')}}"></script>
    <script src="{{ asset('admin-template/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('admin-template/compiled/js/app.js')}}"></script>
    @vite(['resources/assets/admin/js/app.js'])

    <!-- Page Scrpts -->
    @yield('pageScripts')
</body>

</html>
