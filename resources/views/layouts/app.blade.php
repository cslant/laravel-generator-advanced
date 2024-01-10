<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="#">
    <link rel="icon" type="image/png" href="#">
    <title>
        @yield('title', config('lara-gen-adv.tool_name', __('lara-gen-adv::generator.tool_name')))
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files --><!-- Nucleo Icons -->
    <link href="{{ lara_gen_adv_asset('css/main.css') }}" rel="stylesheet"/>
</head>

<body class="g-sidenav-show bg-gray-200">
@include('lara-gen-adv::shared.left_bar')

<div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    @include('lara-gen-adv::shared.navbar')
    <!-- End Navbar -->

    @yield('lara-gen-adv-content')
</div>

@include('lara-gen-adv::shared.configurator_settings')

@include('lara-gen-adv::shared.footer')
</body>
