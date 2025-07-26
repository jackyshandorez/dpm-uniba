@extends('admin.layout.app')
@section('title', 'Organisasi')
@section('breadcrumb1', 'Manajemen')
@section('table', 'tableOrganisasi')

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
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
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
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data Organisasi Kampus</h4>
                                    <a class="heading-elements-toggle"><i data-feather="more-vertical" class="font-medium-3"></i></a>
                                    @include('components.ui.card')
                                </div>

                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                                @include('components.search.search')
                                                <a href="{{ route('organisasi.create') }}" class="btn btn-primary btn-sm">
                                                    <i data-feather="plus"></i> Tambah Organisasi
                                                </a>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="@yield('table')">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Organisasi</th>
                                                            <th>Logo</th>
                                                            <th>Link</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($organisasi as $index => $item)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $item->nama }}</td>
                                                                <td>
                                                                    <img src="{{ $item->logo ? asset('storage/' . $item->logo) : asset('temp-admin/app-assets/images/logo/default.png') }}" alt="Logo" width="50">
                                                                </td>
                                                                <td>
                                                                    @if ($item->link)
                                                                        <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">Kunjungi</a>
                                                                    @else
                                                                        <span class="text-muted">Belum ada</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @include('components.action.action', [
                                                                        'item' => $item,
                                                                        'editRoute' => 'organisasi.edit',
                                                                        'destroyRoute' => 'organisasi.destroy',
                                                                        'prefix' => 'organisasi',
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
                                                            <td colspan="5" class="text-center text-muted">🔍 Data tidak ditemukan</td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Organisasi</th>
                                                            <th>Logo</th>
                                                            <th>Link</th>
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
