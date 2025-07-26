@extends('admin.layout.app')
@section('title', 'Data Formulir')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Data Formulir')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('breadcrumb2')</h4>
                </div>
                <div class="card-body">
                    @if ($forms->count() > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Form</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forms as $index => $form)
                                    <tr>
                                        <td>{{ $forms->firstItem() + $index }}</td>
                                        <td>{{ $form->judul }}</td>
                                        <td>{{ $form->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('pendaftar.diterima', $form->id) }}"
                                                class="btn btn-primary btn-sm">Data Yang Di Terima
                                            </a>
                                            <a href="{{ route('panitia.internal.index', ['form_id' => $form->id]) }}"
                                                class="btn btn-success btn-sm ">
                                                Pembagian Tugas
                                            </a>
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
@endsection
