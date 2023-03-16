<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-5 text-dark" href="javascript:void(0);">{{ config('laravel-generator.app_name') }}</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('title', config('laravel-generator.app_name', __('laravel-generator::generator.app_name')))</li>
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                </div>
            </div>
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:void(0);" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>