@extends('admin.layout.app')
@section('title', 'Tambah Pengguna')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Pengguna')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">@yield('title')</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb2')</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tampilkan error jika ada --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Isi Data Dewan Perwakilan Mahasiswa</h4>
                            @include('components.ui.card')
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body">
                                {{-- FORM IMPORT EXCEL --}}
                                <form action="{{ route('pengguna.import') }}" method="POST" enctype="multipart/form-data"
                                    class="mb-3">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-md-2 label-control">Import Excel</label>
                                        <div class="col-md-6">
                                            <input type="file" name="file"
                                                class="form-control border-primary @error('file') is-invalid @enderror"
                                                accept=".xlsx, .xls, .csv" required>
                                            <small class="form-text text-muted">File Excel (.xlsx, .xls, .csv)</small>
                                            @error('file')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-upload"></i> Import Data Excel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Tombol untuk membuka modal -->
                                <button type="button" class="btn btn-info mb-2" data-toggle="modal"
                                    data-target="#panduanExcelModal">
                                    <i class="fa fa-info-circle"></i> Panduan Format Excel
                                </button>
                                <hr>

                                <form class="form form-horizontal" action="{{ route('pengguna.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            {{-- KIRI --}}
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Nama <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nama"
                                                            class="form-control border-primary @error('nama') is-invalid @enderror"
                                                            value="{{ old('nama') }}" placeholder="Nama Lengkap">
                                                        @error('nama')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Jabatan --}}
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Jabatan <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select name="jabatan_id"
                                                            class="form-control border-primary @error('jabatan_id') is-invalid @enderror">
                                                            <option value="">-- Pilih Jabatan --</option>
                                                            @foreach ($jabatan->sortBy('id') as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('jabatan_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->nama_jabatan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('jabatan_id')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Email <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="email" name="email"
                                                            class="form-control border-primary @error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}" placeholder="Email">
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- Jurusan --}}
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Jurusan <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select name="jurusan_id"
                                                            class="form-control border-primary @error('jurusan_id') is-invalid @enderror">
                                                            <option value="">-- Pilih Jurusan --</option>
                                                            @foreach ($jurusan as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ old('jurusan_id') == $item->id ? 'selected' : '' }}>
                                                                    {{ $item->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('jurusan_id')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Angkatan <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select name="angkatan"
                                                            class="form-control border-primary @error('angkatan') is-invalid @enderror">
                                                            <option value="" disabled selected>Pilih Angkatan</option>
                                                            @for ($year = 2018; $year <= 2100; $year++)
                                                                <option value="{{ $year }}"
                                                                    {{ old('angkatan') == $year ? 'selected' : '' }}>
                                                                    {{ $year }}</option>
                                                            @endfor
                                                        </select>
                                                        @error('angkatan')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Tanggal Lahir <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="date" name="tanggal_lahir"
                                                            class="form-control border-primary @error('tanggal_lahir') is-invalid @enderror"
                                                            value="{{ old('tanggal_lahir') }}">
                                                        @error('tanggal_lahir')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- KANAN --}}
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">NIM <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nik"
                                                            class="form-control border-primary @error('nik') is-invalid @enderror"
                                                            value="{{ old('nik') }}"
                                                            placeholder="Nomor Induk Mahasiswa">
                                                        @error('nik')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Jenis Kelamin <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select name="jenis_kelamin"
                                                            class="form-control border-primary @error('jenis_kelamin') is-invalid @enderror">
                                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                                            <option value="Laki-laki"
                                                                {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                                                Laki-laki</option>
                                                            <option value="Perempuan"
                                                                {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                                                Perempuan</option>
                                                        </select>
                                                        @error('jenis_kelamin')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Telepon</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="telepon"
                                                            class="form-control border-primary @error('telepon') is-invalid @enderror"
                                                            value="{{ old('telepon') }}" placeholder="Nomor Telepon">
                                                        @error('telepon')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Alamat <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <textarea name="alamat" class="form-control border-primary @error('alamat') is-invalid @enderror" rows="3"
                                                            placeholder="Alamat Lengkap">{{ old('alamat') }}</textarea>
                                                        @error('alamat')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Foto</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="foto"
                                                            class="form-control border-primary @error('foto') is-invalid @enderror"
                                                            accept="image/*">
                                                        <small class="form-text text-muted">Maksimal ukuran file 2 MB.
                                                            Format: jpeg, png, jpg, gif.</small>
                                                        @error('foto')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Status <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-md-9">
                                                        <select name="status"
                                                            class="form-control border-primary @error('status') is-invalid @enderror">
                                                            <option value="aktif"
                                                                {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif
                                                            </option>
                                                            <option value="nonaktif"
                                                                {{ old('status') == 'nonaktif' ? 'selected' : '' }}>
                                                                Nonaktif</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <x-action.button href="{{ route('pengguna.index') }}">Batal</x-action.button>
                                        <x-action.button>Simpan</x-action.button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Panduan Excel -->
    <div class="modal fade" id="panduanExcelModal" tabindex="-1" role="dialog" aria-labelledby="panduanExcelLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="panduanExcelLabel"><i class="fa fa-table"></i> Panduan Format Excel</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silakan ikuti format Excel berikut sebelum melakukan import:</p>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>nama</th>
                                    <th>nim</th>
                                    <th>email</th>
                                    <th>jabatan</th>
                                    <th>jurusan</th>
                                    <th>angkatan</th>
                                    <th>tanggal_lahir</th>
                                    <th>jenis_kelamin</th>
                                    <th>status</th>
                                    <th>telepon</th>
                                    <th>alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jeki Seryodi</td>
                                    <td>2202310002</td>
                                    <td>jackyshandorez@gmail.com</td>
                                    <td>Ketua</td>
                                    <td>Informatika</td>
                                    <td>2022</td>
                                    <td>2003-02-28</td>
                                    <td>Laki-laki</td>
                                    <td>aktif</td>
                                    <td>082337943xxx</td>
                                    <td>Lobuk-Bluto-Sumenep</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <ul class="mt-3">
                        <li><strong>Kolom da Baris:</strong> Nama kolom dan nama baris harus berada di A:1</li>
                        <li><strong>Semua kolom harus ada</strong> walau beberapa boleh dikosongkan (seperti
                            <code>telepon</code>).</li>
                        <li><strong>Kolom wajib:</strong> nama, email, jabatan, jurusan, angkatan, tanggal_lahir,
                            jenis_kelamin, status, nik.</li>
                        <li><strong>Tanggal Lahir</strong> bisa dalam format <code>YYYY-MM-DD</code> atau format Excel date
                            (angka).</li>
                        <li><strong>Jenis Kelamin</strong>: "Laki-laki" atau "Perempuan"</li>
                        <li><strong>Status</strong>: "aktif" atau "nonaktif"</li>
                        <li>Pastikan <strong>jabatan</strong> dan <strong>jurusan</strong> sesuai dengan yang ada di sistem.
                        </li>
                        <li>Jika tidak menggunakan data dari excel, cukup input manual di bawah ini</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

@endsection
