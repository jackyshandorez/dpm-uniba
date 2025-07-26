@extends('admin.layout.app')
@section('title', 'Pendaftar Formulir: ' . $form->judul)
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Pendaftar Formulir')
@section('table', 'tableForm')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pendaftar Formulir: {{ $form->judul }}</h4>
                </div>

                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                    @include('components.search.search')
                </div>
                    @if ($submissions->count() > 0)
                        <table class="table table-bordered table-striped" id="@yield('table')">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Tanggal Submit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($submissions as $index => $submission)
                                    @php
                                        // Cari nilai nama dan nim dari fields
                                        $nama =
                                            $submission->fields->firstWhere('field_name', 'nama_lengkap')?->value ??
                                            '-';
                                        $nim = $submission->fields->firstWhere('field_name', 'nim')?->value ?? '-';
                                    @endphp
                                    <tr>
                                        <td>{{ $submissions->firstItem() + $index }}</td>
                                        <td>{{ $nama }}</td>
                                        <td>{{ $nim }}</td>
                                        <td>{{ $submission->created_at->format('d M Y H:i') }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-1">
                                                <form action="{{ route('pendaftar.updateStatus', $submission->id) }}"
                                                    method="POST" id="status-form-{{ $submission->id }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-sm
                                                                @if ($submission->status === 'pending') btn-warning
                                                                @elseif ($submission->status === 'diterima') btn-success
                                                                @else btn-danger @endif"
                                                            type="button" id="dropdownMenuButton-{{ $submission->id }}"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            @if ($submission->status === 'pending')
                                                                <i data-feather="clock"></i>
                                                            @elseif ($submission->status === 'diterima')
                                                                <i data-feather="check-circle"></i>
                                                            @else
                                                                <i data-feather="x-circle"></i>
                                                            @endif
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton-{{ $submission->id }}">
                                                            <button class="dropdown-item" type="submit" name="status"
                                                                value="diterima">
                                                                <i data-feather="check-circle" class="mr-1"></i> Diterima
                                                            </button>
                                                            <button class="dropdown-item" type="submit" name="status"
                                                                value="ditolak">
                                                                <i data-feather="x-circle" class="mr-1"></i> Ditolak
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                                {{-- Tombol aksi tambahan --}}
                                                <div>
                                                    @include('components.action.action', [
                                                        'item' => $submission,
                                                        'showRoute' => 'pendaftar.show',
                                                        'prefix' => 'pendaftar',
                                                    ])
                                                </div>
                                            </div>
                                        </td>


                                    </tr>
                                @endforeach
                                <tr id="noDataRow" style="display: none;">
                                    <td colspan="6" class="text-center text-muted">🔍 Data tidak ditemukan</td>
                                </tr>
                            </tbody>
                        </table>

                        {{ $submissions->links() }}
                    @else
                        <p>Belum ada pendaftar untuk formulir ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('components.script.script')

@endsection
