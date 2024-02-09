<script src="{{ asset('asset-admin') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('asset-admin') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('asset-admin') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('asset-admin') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('asset-admin') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('asset-admin') }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('asset-admin') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('asset-admin') }}/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    {{-- @livewireScripts --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script> --}}
    <script>
        window.addEventListener('createModalToggle', event => {
            $('#createModal').modal('toggle');
           
        })
        
        window.addEventListener('editModalToggle', event => {
            $('#editModal').modal('toggle');
        })
        
        window.addEventListener('deleteModalToggle', event => {
            $('#deleteModal').modal('toggle');
        })
        
        window.addEventListener('showModalToggle', event => {
            $('#showModal').modal('toggle');
        })
        </script>