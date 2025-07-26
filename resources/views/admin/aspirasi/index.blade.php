@extends('admin.layout.app')
@section('title', 'Data Aspirasi')
@section('breadcrumb1', 'Aspirasi')
@section('table', 'tableAspirasi')

@section('content')
    @include('components.sweet-alert.simpan-data')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">@yield('breadcrumb1')</h3>
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
                                    <h4 class="card-title" id="horz-layout-card-center">@yield('title')</h4>
                                    <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                            class="font-medium-3"></i></a>
                                    @include('components.ui.card')
                                </div>
                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div
                                                class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                                @include('components.search.search')
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="@yield('table')">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Judul Aspirasi</th>
                                                            <th>Tanggal Kirim</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="tableBody">
                                                        @foreach ($aspirasi as $index => $item)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $item->anonim ? 'Anonim' : $item->nama }}</td>
                                                                <td>{{ $item->judul_aspirasi }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}
                                                                </td>
                                                                <td>
                                                                    @include('components.action.action', [
                                                                        'item' => $item,
                                                                        'showRoute' => 'aspirasi.show',
                                                                        'destroyRoute' => 'aspirasi.destroy',
                                                                        'prefix' => 'aspirasi',
                                                                    ])
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        @if (session('success'))
                                                            @include('components.modal.modal-sukses', [
                                                                'id' => 'successModal',
                                                                'nama' => session('success'),
                                                                'action' => '#',
                                                            ])
                                                        @endif

                                                        <tr id="noDataRow" style="display: none;">
                                                            <td colspan="5" class="text-center text-muted">🔍 Data tidak
                                                                ditemukan</td>
                                                        </tr>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Judul Aspirasi</th>
                                                            <th>Tanggal Kirim</th>
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
            const table = document.getElementById('tableAspirasi');
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
            const table = document.getElementById('tableAspirasi'); // Sesuaikan id tabel jika berbeda
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
