<!--   Core JS Files   -->
<script src="{{ lara_gen_adv_asset('js/main.js') }}"></script>
<script>
    const win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        const options = {
            damping: '0.5'
        };
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script src="{{ lara_gen_adv_asset('js/material-dashboard.min.js') }}"></script>

</html>
