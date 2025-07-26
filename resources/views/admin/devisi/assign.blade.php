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
                                        @forelse ($panitiaInternal as $i => $pi)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $pi->pengguna->nama ?? '-' }}</td>
                                                <td>{{ $pi->devisi->nama ?? '-' }}</td>
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
                                                <td>{{ $pe->pengguna->nama ?? '-' }}</td>
                                                <td>{{ $pe->devisi->nama ?? '-' }}</td>
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

                {{-- Form Assign --}}
                <div class="row">
                    {{-- Form Internal --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white">Assign Panitia Internal</div>
                            <div class="card-body">
                                <form action="{{ route('devisi.assign') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipe" value="internal">
                                    <div class="form-group">
                                        <label for="pengguna_id_internal">Nama Panitia</label>
                                        <select name="pengguna_id" class="form-control" required>
                                            <option value="">-- Pilih Pengguna --</option>
                                            @foreach ($penggunaList as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="devisi_id_internal">Devisi</label>
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
                                <form action="{{ route('devisi.assign') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tipe" value="eksternal">
                                    <div class="form-group">
                                        <label for="pengguna_id_eksternal">Nama Panitia</label>
                                        <select name="pengguna_id" class="form-control" required>
                                            <option value="">-- Pilih Pengguna --</option>
                                            @foreach ($penggunaList as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="devisi_id_eksternal">Devisi</label>
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

                {{-- Tabel Rekap Semua Panitia --}}
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-dark text-white">Rekap Semua Panitia</div>
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
                                        @foreach ($panitiaInternal as $pi)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pi->pengguna->nama ?? '-' }}</td>
                                                <td>Internal</td>
                                                <td>{{ $pi->devisi->nama ?? '-' }}</td>
                                            </tr>
                                        @endforeach

                                        @foreach ($panitiaEksternal as $pe)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pe->pengguna->nama ?? '-' }}</td>
                                                <td>Eksternal</td>
                                                <td>{{ $pe->devisi->nama ?? '-' }}</td>
                                            </tr>
                                        @endforeach

                                        @if ($no === 1)
                                            <tr>
                                                <td colspan="4" class="text-center">Belum ada data panitia</td>
                                            </tr>
                                        @endif
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
