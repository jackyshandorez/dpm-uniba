@extends('admin.layout.app')
@section('title', 'Pendaftar Diterima: ' . $form->judul)
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Pendaftar Diterima')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pendaftar Diterima: {{ $form->judul }}</h4>
            </div>
            <div class="card-body">
                @if ($submissions->count() > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Tanggal Submit</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $index => $submission)
                                @php
                                    $nama = $submission->fields->firstWhere('field_name', 'nama_lengkap')?->value ?? '-';
                                    $nim = $submission->fields->firstWhere('field_name', 'nim')?->value ?? '-';
                                @endphp
                                <tr>
                                    <td>{{ $submissions->firstItem() + $index }}</td>
                                    <td>{{ $nama }}</td>
                                    <td>{{ $nim }}</td>
                                    <td>{{ $submission->created_at->format('d M Y H:i') }}</td>
                                    <td><span class="badge bg-success">Diterima</span></td>
                                    <td>
                                        @include('components.action.action', [
                                            'item' => $submission,
                                            'showRoute' => 'pendaftar.show',
                                            'prefix' => 'pendaftar',
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $submissions->links() }}
                @else
                    <p>Tidak ada pendaftar yang diterima.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
