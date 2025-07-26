@extends('admin.layout.app')
@section('title', 'Admin')
@section('breadcrumb1', 'Manajemen')
@section('table', 'tableAdmin')

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
                                    <h4 class="card-title">Data Admin & Superadmin</h4>
                                    @include('components.ui.card')
                                </div>

                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <div
                                                class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                                @include('components.search.search')

                                                <a href="{{ route('admin.create') }}" class="btn btn-primary btn-sm">
                                                    <i data-feather="plus"></i> Tambah Admin
                                                </a>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="@yield('table')">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Role</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($admins as $index => $item)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $item->name }}</td>
                                                                <td>{{ $item->email }}</td>
                                                                <td>{{ ucfirst($item->role) }}</td>
                                                                <td>{{ $item->jenis_kelamin ?? '-' }}</td>
                                                                <td>
                                                                    {{-- Tombol Edit: admin tidak bisa edit superadmin --}}
                                                                    @if (auth()->user()->isSuperAdmin())
                                                                        <a href="{{ route('admin.edit', $item->id) }}"
                                                                            class="btn btn-warning btn-sm">Edit</a>
                                                                        <form
                                                                            action="{{ route('admin.destroy', $item->id) }}"
                                                                            method="POST" style="display:inline;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm"
                                                                                onclick="return confirm('Yakin ingin menghapus admin ini?')">
                                                                                Hapus
                                                                            </button>
                                                                        </form>
                                                                @else
                                                                    {{-- Jika bukan superadmin, tampilkan info saja --}}
                                                                    <span class="badge badge-secondary">Super Admin Hak Akses</span>
                                                        @endif
                                                        </td>
                                                        </tr>
                                                        @endforeach

                                                        @if (session('success'))
                                                            {{-- @include('components.modal.modal-sukses', [
                                                                'id' => 'modalSukses',
                                                                'nama' => session('success'),
                                                                'action' => '#',
                                                            ]) --}}
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
                                                            <th>Email</th>
                                                            <th>Role</th>
                                                            <th>Jenis Kelamin</th>
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
