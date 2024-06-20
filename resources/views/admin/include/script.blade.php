    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    @yield('vendor-script')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('page-script')
    <!-- END: Page JS-->
    
    <!-- Pricing Modal JS-->
    @stack('pricing-script')
    <!-- END: Pricing Modal JS-->


    <!-- Fitur Check All Checkbox Rekap Data -->
    <script>
        // Fungsi untuk menangani Check All pada filter Kabupaten/Kota
        document.getElementById('checkAllKota').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll("input[name='kabupatenKota[]']");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = document.getElementById('checkAllKota').checked;
            });
        });

        // Fungsi untuk menangani Check All pada filter Akreditasi
        document.getElementById('checkAllAkreditasi').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll("input[name='akreditasi[]']");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = document.getElementById('checkAllAkreditasi').checked;
            });
        });

        // Fungsi untuk menangani Check All pada filter Perguruan Tinggi
        document.getElementById('checkAllPt').addEventListener('change', function() {
            // Menyertakan lebih dari satu nama dalam query selector
            var checkboxes = document.querySelectorAll(
                "input[name='ptBaru'], input[name='ptKadaluarsa'], input[name='ptBantuanSPMI']");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = document.getElementById('checkAllPt').checked;
            });
        });

        // Fungsi untuk menangani Check All pada filter Program Studi
        document.getElementById('checkAllProdi').addEventListener('change', function() {
            // Menyertakan lebih dari satu nama dalam query selector
            var checkboxes = document.querySelectorAll(
                "input[name='prodiBaru'], input[name='prodiKadaluarsa']");
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = document.getElementById('checkAllProdi').checked;
            });
        });
    </script>
