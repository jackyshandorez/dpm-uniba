@extends('admin.layout.app')

@section('title', 'Daftar Form Rekrutmen')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Daftar Form')

@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">@yield('breadcrumb2')</h3>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="breadcrumb-wrapper float-md-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
                            <li class="breadcrumb-item active">@yield('breadcrumb2')</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">@yield('breadcrumb2')</h4>
                            <a href="{{ route('oprek.create') }}" class="btn btn-primary btn-sm">
                                <i data-feather="plus"></i> Tambah Form Baru
                            </a>
                        </div>

                        <div class="card-body table-responsive">
                            @if ($rekrutmen_forms->count())
                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th>Judul Form</th>
                                            <th style="width: 10%;">Status</th>
                                            <th style="width: 20%;">Batas Akhir</th>
                                            <th style="width: 20%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekrutmen_forms as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>
                                                    <form action="{{ route('oprek.toggleStatus', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="btn btn-sm {{ $item->status == 'buka' ? 'btn-success' : 'btn-danger' }}">
                                                            {{ ucfirst($item->status ?? 'tutup') }}
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    {{ $item->batas_akhir ? \Carbon\Carbon::parse($item->batas_akhir)->format('d M Y H:i') : '-' }}
                                                </td>
                                                <td>
                                                    @include('components.action.action', [
                                                        'item' => $item,
                                                        'showRoute' => 'oprek.show',
                                                        'editRoute' => 'oprek.edit',
                                                        'destroyRoute' => 'oprek.destroy',
                                                        'prefix' => 'oprek',
                                                    ])
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-center mb-0">Belum ada form rekrutmen yang dibuat.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        feather.replace();
    </script>
@endsection
