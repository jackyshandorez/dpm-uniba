@extends('admin.layout.app')
@section('title', 'Devisi')
@section('breadcrumb1', 'Manajemen')
@section('table', 'tableDevisi')

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
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="devisi-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Informasi Kategori Devisi</h4>
                                    @include('components.ui.card')
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="d-flex flex-wrap align-items-center justify-content-end mb-2">
                                            <x-action.button href="{{ route('devisi.create') }}">Tambah
                                                Devisi</x-action>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="@yield('table')">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Devisi</th>
                                                        <th>Warna</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kategoriDevisi as $index => $item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>
                                                                <span class="badge"
                                                                    style="background-color: {{ $item->warna }}">
                                                                    {{ $item->warna }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                @include('components.action.action', [
                                                                    'item' => $item,
                                                                    'editRoute' => 'devisi.edit',
                                                                    'destroyRoute' => 'devisi.destroy',
                                                                    'prefix' => 'devisi',
                                                                ])
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
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
