<script src="{{ asset('themeKita/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/ready.min.js') }}"></script>
<script src="{{ asset('themeKita/assets/js/demo.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var fileInput = document.getElementById('cvUpload');
        var fileLabel = fileInput.nextElementSibling;

        fileInput.addEventListener('change', function() {
            var fileName = fileInput.files[0] ? fileInput.files[0].name : 'Pilih file';
            fileLabel.textContent = fileName;
        });
    });
</script>

{{-- SCRIPT DASHBOARD UBAH CV --}}
<script>
    document.getElementById('editCvButton').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('editCvMessage').style.display = 'none';
        document.getElementById('editCvForm').style.display = 'block';
    });
</script>

{{-- LARAVEL MIX --}}
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        $(".preloader").fadeOut();
    });
</script>

{{-- PROGRAMMER WEB-HIMSI BY: --}}
{{-- 1. M. SYAHRUL SAEFULAH (2022)  --}}
{{-- 2. MOHAMMAD ALFI HAMZAMI (2024) --}}
{{-- 3. >>> ??? <<< --}}
