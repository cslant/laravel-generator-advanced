<!--   Core JS Files   -->
<script src="{{ laravel_generator_asset('js/main.js') }}"></script>
<script>
    const win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        const options = {
            damping: '0.5'
        };
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script src="{{ laravel_generator_asset('js/material-dashboard.min.js') }}"></script>

</html>
