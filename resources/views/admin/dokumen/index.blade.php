@extends('admin.layout.app')
@section('title', 'Dokumen')
@section('breadcrumb1', 'Laporan')
@section('breadcrumb2', 'Data Dokumen')
@section('table', 'tableDokumen')

@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">@yield('title')</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item active">@yield('breadcrumb2')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Dokumen</h4>
                    @include('components.ui.card')
                </div>
                <div class="card-body card-dashboard">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                        @include('components.search.search')
                        <a href="{{ route('dokumen.create') }}" class="btn btn-primary btn-sm">
                            <i data-feather="plus"></i> Tambah Dokumen
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="@yield('table')">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @forelse($dokumen as $index => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->penulis }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_terbit)->format('d M Y') }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $item->status == 'publish' ? 'badge-success' : 'badge-warning' }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">

                                                <a href="{{ route('dokumen.show', ['slug' => $item->slug]) }}"
                                                    class="btn btn-info">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </div>
                                            @include('components.action.action', [
                                                'item' => $item,
                                                'editRoute' => 'dokumen.edit',
                                                'destroyRoute' => 'dokumen.destroy',
                                                'prefix' => 'dokumen',
                                            ])
                                        </td>
                                    </tr>
                                @empty
                                    <tr id="noDataRow">
                                        <td colspan="6" class="text-center text-muted">🔍 Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    @if (session('success'))
                        @include('components.modal.modal-sukses', [
                            'id' => 'successModal',
                            'nama' => session('success'),
                            'action' => '#',
                        ])
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Show modal success on success --}}
    <script>
        $(document).ready(function() {
            @if (session('success'))
                $('#modalSukses').modal('show');
            @endif
        });
    </script>

    @include('components.script.script')
@endsection
