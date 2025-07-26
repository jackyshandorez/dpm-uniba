
@extends('admin.layout.app')
@section('title', 'Daftar Agenda')
@section('breadcrumb1', 'Agenda & Kegiatan')

@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Data Pengguna</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            {{-- notif --}}
                            {{-- @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif --}}

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="horz-layout-card-center">Isi Data Jurusan</h4>
                                    <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                            class="font-medium-3"></i></a>
                                    @include('components.ui.card')
                                </div>

                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                                @include('components.search.search')>
                                                <a href="tambah_agenda" class="btn btn-primary btn-sm">
                                                    <i data-feather="plus"></i> Tambah Agenda
                                                </a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="tableAgenda">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul</th>
                                                            <th>Deskripsi</th>
                                                            <th>Tanggal</th>
                                                            <th>Waktu</th>
                                                            <th>Lokasi</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($agenda as $index => $item)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $item->judul }}</td>
                                                                <td>{{ $item->deskripsi }}</td>
                                                                <td>{{ $item->tanggal }}</td>
                                                                <td>{{ $item->waktu }}</td>
                                                                <td>{{ $item->lokasi }}</td>
                                                                <td>{{ $item->status }}</td>
                                                                <td>
                                                                    <a href="/agenda/{{ $item->id }}/edit"
                                                                        class="btn btn-sm btn-warning">
                                                                        <i data-feather="edit"></i>
                                                                    </a>

                                                                    <!-- Tombol Trigger Modal Hapus -->
                                                                    <button type="button" class="btn btn-sm btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#modalHapus{{ $item->id }}">
                                                                        <i data-feather="trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal Hapus -->
                                                            @include('components.modal.modal-hapus', [
                                                                'id' => $item->id,
                                                                'nama' => $item->nama,
                                                                'action' => "/agenda/{$item->id}",
                                                            ])
                                                        @endforeach

                                                        @if (session('success'))
                                                            @include('components.modal.modal-sukses', [
                                                                'id' => 'successModal',
                                                                'nama' => session('success'),
                                                                'action' => '#',
                                                            ])
                                                        @endif

                                                        <tr id="noDataRow" style="display: none;">
                                                            <td colspan="8" class="text-center text-muted">🔍 Data tidak ditemukan</td>
                                                        </tr>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul</th>
                                                            <th>Deskripsi</th>
                                                            <th>Tanggal</th>
                                                            <th>Waktu</th>
                                                            <th>Lokasi</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            @if (session('success'))
                $('#modalSukses').modal('show');
            @endif
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('customSearch');
            const table = document.getElementById('tablePengguna');
            const tbody = document.getElementById('tableBody');
            const rows = tbody.getElementsByTagName('tr');
            const noDataRow = document.getElementById('noDataRow');

            searchInput.addEventListener('keyup', function() {
                const searchText = this.value.toLowerCase();
                let found = 0;

                for (let i = 0; i < rows.length; i++) {
                    if (rows[i] === noDataRow) continue; // lewati baris "tidak ditemukan"
                    const row = rows[i];
                    const rowText = row.innerText.toLowerCase();

                    if (rowText.includes(searchText)) {
                        row.style.display = '';
                        found++;
                    } else {
                        row.style.display = 'none';
                    }
                }

                noDataRow.style.display = (found === 0) ? '' : 'none';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const entriesSelect = document.getElementById('entriesLength');
    const table = document.getElementById('tablePengguna');  // Sesuaikan id tabel jika berbeda
    const tbody = table.getElementsByTagName('tbody')[0];
    const allRows = Array.from(tbody.getElementsByTagName('tr'));

    function updateTableEntries() {
        const max = parseInt(entriesSelect.value);
        const searchText = document.getElementById('customSearch').value.toLowerCase();
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
    }

    entriesSelect.addEventListener('change', updateTableEntries);
    document.getElementById('customSearch').addEventListener('keyup', updateTableEntries);

    updateTableEntries(); // initial load
});

    </script>
@endsection
