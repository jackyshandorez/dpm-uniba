@extends('admin.layout.app')
@section('title', 'Pengguna')
@section('breadcrumb1', 'Manajemen')
@section('table', 'tableAlumni')


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
                                    <h4 class="card-title" id="horz-layout-card-center">Isi Data Alumni</h4>
                                    <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                            class="font-medium-3"></i></a>
                                    @include('components.ui.card')
                                </div>
                                @foreach ($alumniByPeriode as $periode => $items)

                                    <div class="card mb-3">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4 class="card-title">Angkatan {{ $periode }}</h4>
                                            <a href="{{ route('alumni.create', ['periode' => $periode]) }}"
                                                class="btn btn-primary btn-sm">
                                                <i data-feather="plus"></i> Tambah Alumni
                                            </a>
                                        </div>

                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered" id="@yield('table')">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>Jabatan</th>
                                                                <th>Periode</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($items as $index => $item)
                                                                <tr>
                                                                    <td>{{ $index + 1 }}</td>
                                                                    <td>{{ $item->nama_alumni }}</td>
                                                                    <td>{{ optional($item->jabatan)->nama_jabatan ?? 'Tidak tersedia' }}
                                                                    </td>
                                                                    <td>{{ $item->periode }}</td>
                                                                    <td>
                                                                        @include('components.action.action',
                                                                            [
                                                                                'item' => $item,
                                                                                'editRoute' => 'alumni.edit',
                                                                                'destroyRoute' => 'alumni.destroy',
                                                                                'prefix' => 'alumni',
                                                                            ]
                                                                        )
                                                                    </td>
                                                                </tr>

                                                                <!-- Modal Hapus -->
                                                                @include('components.modal.modal-hapus', [
                                                                    'id' => $item->id,
                                                                    'nama' => $item->nama,
                                                                    'action' => "/alumni/{$item->id}",
                                                                ])
                                                            @empty
                                                                <tr>
                                                                    <td colspan="5" class="text-center text-muted">Belum
                                                                        ada data alumni.</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

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

@endsection
