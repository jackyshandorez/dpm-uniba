@extends('admin.layout.app')

@section('title', 'Assign Panitia ke Devisi')

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

            <div class="container mt-4">

                {{-- Rekap Semua Panitia --}}
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <span>REKAP SEMUA PANITIA</span>
                                <a href="{{ route('panitia.export') }}" class="btn btn-success btn-sm">
                                    <i data-feather="download"></i> Export Excel
                                </a>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered table-sm table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Panitia</th>
                                            <th>Jenis</th>
                                            <th>Devisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($rekapSemuaPanitia as $p)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    @if ($p->jenis === 'internal')
                                                        {{ $p->pengguna->nama ?? '-' }}
                                                    @elseif ($p->jenis === 'eksternal')
                                                        {{ $p->submission?->fields?->firstWhere('field_name', 'nama_lengkap')?->value ?? '-' }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge badge-{{ $p->jenis === 'internal' ? 'primary' : 'success' }}">
                                                        {{ ucfirst($p->jenis) }}
                                                    </span>
                                                </td>
                                                <td>{{ $p->devisi->nama ?? '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Belum ada data panitia</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Assign --}}
                <div class="row">
                    {{-- Form Internal --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white">Assign Panitia Internal</div>
                            <div class="card-body">
                                <form action="{{ route('panitia.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="form_id" value="{{ $form->id }}">
                                    <input type="hidden" name="tipe" value="internal">

                                    <div class="form-group">
                                        <label for="pengguna_id">Nama Panitia</label>
                                        <select name="pengguna_id" class="form-control" required>
                                            <option value="">-- Pilih Pengguna --</option>
                                            @foreach ($penggunaList as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="devisi_id">Devisi</label>
                                        <select name="devisi_id" class="form-control" required>
                                            <option value="">-- Pilih Devisi --</option>
                                            @foreach ($devisiList as $d)
                                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan Internal</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Form Eksternal --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-success text-white">Assign Panitia Eksternal</div>
                            <div class="card-body">
                                <form action="{{ route('panitia.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="form_id" value="{{ $form->id }}">
                                    <input type="hidden" name="tipe" value="eksternal">

                                    <div class="form-group">
                                        <label for="submission_id">Nama Panitia Eksternal</label>
                                        <select name="submission_id" class="form-control" required>
                                            <option value="">-- Pilih Panitia Eksternal --</option>
                                            @foreach ($panitiaEksternal as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="devisi_id">Devisi</label>
                                        <select name="devisi_id" class="form-control" required>
                                            <option value="">-- Pilih Devisi --</option>
                                            @foreach ($devisiList as $d)
                                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Simpan Eksternal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    {{-- Tabel Panitia Internal --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-info text-white">Daftar Panitia Internal</div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Panitia</th>
                                            <th>Devisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($penggunaList as $i => $user)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $user->nama }}</td>
                                                <td>{{ $panitiaInternal[$user->id]->devisi->nama ?? '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Belum ada pengguna</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- Tabel Panitia Eksternal --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">Daftar Panitia Eksternal</div>
                            <div class="card-body">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Panitia</th>
                                            <th>Devisi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($panitiaEksternal as $i => $pe)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $pe->nama }}</td>
                                                <td>{{ $pe->devisi ?? 'Belum diassign' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Belum ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
