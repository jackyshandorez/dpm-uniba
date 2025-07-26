@extends('admin.layout.app')
@section('title', 'Pengguna')
@section('breadcrumb1', 'Manajemen')
@section('table', 'tablePengguna')

@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Data @yield('title')</h3>
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
                                    <h4 class="card-title" id="horz-layout-card-center">Data Dewan Perwakilan Mahasiswa</h4>
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
                                                <a href="{{ route('pengguna.export.excel') }}"
                                                    class="btn btn-success btn-sm">
                                                    <i data-feather="download"></i> Export Excel
                                                </a>
                                                <a href="{{ route('pengguna.create') }}" class="btn btn-primary btn-sm">
                                                    <i data-feather="plus"></i> Tambah Pengguna
                                                </a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="@yield('table')">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Jabatan</th>
                                                            <th>Jurusan</th>
                                                            <th>Angkatan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pengguna as $index => $item)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $item->nama }}</td>
                                                                <td>{{ $item->jabatan->nama_jabatan ?? 'Tidak Ada' }}</td>
                                                                <td>{{ $item->jurusan->nama ?? 'Tidak Ada' }}</td>
                                                                <td>{{ $item->angkatan }}</td>
                                                                <td>
                                                                    @include('components.action.action', [
                                                                        'item' => $item,
                                                                        'showRoute' => 'pengguna.show',
                                                                        'editRoute' => 'pengguna.edit',
                                                                        'destroyRoute' => 'pengguna.destroy',
                                                                        'prefix' => 'pengguna',
                                                                    ])
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        <!-- Modal Sukses -->
                                                        @if (session('success'))
                                                            @include('components.modal.modal-sukses', [
                                                                'id' => 'successModal',
                                                                'nama' => session('success'),
                                                                'action' => '#', // action tidak diperlukan karena ini hanya info sukses
                                                            ])
                                                        @endif
                                                        <tr id="noDataRow" style="display: none;">
                                                            <td colspan="6" class="text-center text-muted">🔍 Data tidak
                                                                ditemukan</td>
                                                        </tr>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Jabatan</th>
                                                            <th>Jurusan</th>
                                                            <th>Angkatan</th>
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

    @include('components.script.script')


@endsection
