@extends('admin.layout.app')
@section('title', 'Surat Masuk')
@section('breadcrumb1', 'Surat')
@section('table', 'tableSuratMasuk')

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
                                    <h4 class="card-title" id="horz-layout-card-center">Data Surat Masuk</h4>
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
                                                <a href="{{ route('surat.masuk.create') }}" class="btn btn-primary btn-sm">
                                                    <i data-feather="plus"></i> Tambah Surat Masuk
                                                </a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="@yield('table')">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Surat</th>
                                                            <th>Pengirim</th>
                                                            <th>Tanggal Surat</th>
                                                            <th>Perihal</th>
                                                            <th>Status</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($suratMasuk as $index => $item)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $item->nomor_surat }}</td>
                                                                <td>{{ $item->pengirim }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d-m-Y') }}
                                                                </td>
                                                                <td>{{ $item->perihal }}</td>
                                                                <td>
                                                                    @if ($item->status == 'baru')
                                                                        <span class="badge badge-primary">Baru</span>
                                                                    @elseif ($item->status == 'diproses')
                                                                        <span class="badge badge-warning">Diproses</span>
                                                                    @elseif ($item->status == 'selesai')
                                                                        <span class="badge badge-success">Selesai</span>
                                                                    @else
                                                                        <span class="badge badge-secondary">Tidak
                                                                            Diketahui</span>
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    @include('components.action.action', [
                                                                        'item' => $item,
                                                                        'showRoute' => 'surat.masuk.show',
                                                                        'editRoute' => 'surat.masuk.edit',
                                                                        'destroyRoute' => 'surat.masuk.destroy',
                                                                        'prefix' => 'surat-masuk',
                                                                    ])
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        {{-- Modal Sukses --}}
                                                        @if (session('success'))
                                                            @include('components.modal.modal-sukses', [
                                                                'id' => 'successModal',
                                                                'nama' => session('success'),
                                                                'action' => '#',
                                                            ])
                                                        @endif
                                                        <tr id="noDataRow" style="display: none;">
                                                            <td colspan="7" class="text-center text-muted">🔍 Data tidak
                                                                ditemukan</td>
                                                        </tr>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Surat</th>
                                                            <th>Pengirim</th>
                                                            <th>Tanggal Surat</th>
                                                            <th>Perihal</th>
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

    @include('components.script.script')

@endsection
