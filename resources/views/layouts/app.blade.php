<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="#">
    <link rel="icon" type="image/png" href="#">
    <title>
        @yield('title', config('laravel-generator.app_name', 'Laravel Generator'))
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files --><!-- Nucleo Icons -->
    <link id="pagestyle" href="{{ laravel_generator_asset('css/main.css') }}" rel="stylesheet"/>
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('laravel-generator::shared.left_bar')

    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
        @include('laravel-generator::shared.navbar')
        <!-- End Navbar -->

        @yield('laravel-generator-content')
    </div>

    @include('laravel-generator::shared.configurator_settings')

    @include('laravel-generator::shared.footer')
</body>