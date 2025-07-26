@extends('admin.layout.app')
@section('title', 'Data Formulir')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Data Formulir')
@section('table', 'tableForm')


@section('content')
    @include('components.sweet-alert.simpan-data')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('breadcrumb2')</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                        @include('components.search.search')
                    </div>
                    <div class="table-responsive">
                    @if ($forms->count() > 0)
                        <table class="table table-bordered table-striped" id="@yield('table')">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Form</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach ($forms as $index => $form)
                                    <tr>
                                        <td>{{ $forms->firstItem() + $index }}</td>
                                        <td>{{ $form->judul }}</td>
                                        <td>{{ $form->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('formulir.pendaftar', $form->id) }}"
                                                class="btn btn-primary btn-sm">Lihat Pendaftar</a>
                                            {{-- @include('components.action.action', [
                                                'item' => $form,
                                                'showRoute' => 'pendaftar.show',
                                                'editRoute' => 'pendaftar.edit',
                                                'destroyRoute' => 'pendaftar.destroy',
                                                'prefix' => 'pendaftar',
                                            ]) --}}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr id="noDataRow" style="display: none;">
                                    <td colspan="6" class="text-center text-muted">🔍 Data tidak ditemukan</td>
                                </tr>
                            </tbody>
                        </table>

                        {{ $forms->links() }}
                    @else
                        <p>Tidak ada formulir yang sudah diisi.</p>
                    @endif
                </div>
                </div>

            </div>
        </div>
    </div>
    @include('components.script.script')

@endsection
