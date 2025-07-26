{{-- Pencarian Tabel --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const entriesSelect = document.getElementById('entriesLength');
        const searchInput = document.getElementById('customSearch');
        const table = document.getElementById('@yield('table')');
        const tbody = table.getElementsByTagName('tbody')[0];
        const allRows = Array.from(tbody.querySelectorAll('tr')).filter(row => !row.id.includes('noDataRow'));
        const noDataRow = document.getElementById('noDataRow');

        function updateTableEntries() {
            const max = parseInt(entriesSelect.value);
            const searchText = searchInput.value.toLowerCase();
            let visibleCount = 0;

            allRows.forEach(row => {
                const matches = row.innerText.toLowerCase().includes(searchText);
                if (matches && visibleCount < max) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Tampilkan atau sembunyikan baris "Data tidak ditemukan"
            if (visibleCount === 0) {
                noDataRow.style.display = '';
            } else {
                noDataRow.style.display = 'none';
            }
        }

        entriesSelect.addEventListener('change', updateTableEntries);
        searchInput.addEventListener('keyup', updateTableEntries);

        updateTableEntries(); // Load awal
    });
</script>

{{-- End Pencarian Tabel --}}


