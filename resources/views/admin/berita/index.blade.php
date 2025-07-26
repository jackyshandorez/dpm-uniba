@extends('admin.layout.app')
@section('title', 'Daftar Berita')
@section('breadcrumb1', 'Berita')
@section('table', 'tableBerita')

@section('content')
    @include('components.sweet-alert.simpan-data')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Berita</h3>
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
                                    <h4 class="card-title" id="horz-layout-card-center">Daftar Berita</h4>
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
                                                <a href="tambah_berita" class="btn btn-primary btn-sm">
                                                    <i data-feather="plus"></i> Tambah Berita
                                                </a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="@yield('table')">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th style="max-width: 250px;">Judul</th>
                                                            <th>Kategori</th>
                                                            <th>Waktu Publish</th>
                                                            <th>Status</th>
                                                            <th>Thumbnail</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($berita as $index => $item)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td class="text-truncate" style="max-width: 250px";>
                                                                    {{ $item->judul }}</td>
                                                                <td>{{ $item->kategori->nama ?? 'Tidak Diketahui' }}</td>

                                                                <td>{{ $item->tanggal_publish }}</td>
                                                                <td>{{ $item->status }}</td>
                                                                <td>
                                                                    @if ($item->thumbnail)
                                                                        <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                                                            alt="Thumbnail"
                                                                            style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                                                                    @else
                                                                        <small class="text-muted">Tidak ada</small>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @include('components.action.action', [
                                                                        'item' => $item,
                                                                        'showRoute' => 'berita.show',
                                                                        'editRoute' => 'berita.edit',
                                                                        'destroyRoute' => 'berita.destroy',
                                                                        'prefix' => 'berita',
                                                                    ])
                                                                </td>
                                                            </tr>

                                                            <!-- Modal Hapus -->
                                                            @include('components.modal.modal-hapus', [
                                                                'id' => $item->id,
                                                                'nama' => $item->judul,
                                                                'action' => "/berita/{$item->id}",
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
                                                            <td colspan="7" class="text-center text-muted">🔍 Data tidak
                                                                ditemukan</td>
                                                        </tr>
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul</th>
                                                            <th>Kategori</th>
                                                            <th>Tanggal Publish</th>
                                                            <th>Status</th>
                                                            <th>Thumbnail</th>
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
