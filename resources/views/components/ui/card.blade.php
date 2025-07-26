<div class="heading-elements">
    <ul class="list-inline mb-0">
        <li><a data-action="collapse"><i data-feather="minus"></i></a></li>
        <li><a href="#" onclick="resetAllForms();" data-action="reload"><i data-feather="rotate-cw"></i></a></li>
        <li><a data-action="expand"><i data-feather="maximize"></i></a></li>
        <li><a data-action="close"><i data-feather="x"></i></a></li>
    </ul>
</div>
<script>
function resetAllForms() {
    // Cari semua form di dalam .card lalu reset
    document.querySelectorAll('.card form').forEach(function(form) {
        form.reset();
    });

    // Kalau pakai select2 / selectpicker / plugin lain:
    // $('.card select').val(null).trigger('change');

    // Kalau mau feather icon update (jaga-jaga kalau icon berubah)
    if (window.feather) {
        feather.replace();
    }
}
</script>
