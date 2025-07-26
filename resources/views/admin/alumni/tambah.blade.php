@extends('admin.layout.app')
@section('title', 'Alumni')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Tambah Alumni')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">@yield('breadcrumb2')</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                                <li class="breadcrumb-item active">@yield('breadcrumb2')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-card-center">Form Tambah Alumni</h4>
                            @include('components.ui.card')
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('alumni.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">

                                        <!-- Nama Alumni -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="nama_alumni">Nama Alumni<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="nama_alumni" class="form-control"
                                                    name="nama_alumni" value="{{ old('nama_alumni') }}">
                                                @error('nama_alumni')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Jabatan -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="jabatan_id">Jabatan<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select id="jabatan_id" class="form-control" name="jabatan_id">
                                                    <option value="">-- Pilih Jabatan --</option>
                                                    @foreach ($jabatan as $jbt)
                                                        <option value="{{ $jbt->id }}"
                                                            {{ old('jabatan_id') == $jbt->id ? 'selected' : '' }}>
                                                            {{ $jbt->nama_jabatan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('jabatan_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="jenis_kelamin">Jenis Kelamin <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="Laki-laki"
                                                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Periode / Angkatan -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="periode">Periode<span
                                                    class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="periode" class="form-control" name="periode"
                                                    value="{{ old('periode') }}">
                                                <small class="text-muted">Contoh: 2020-2021</small>
                                                @error('periode')
                                                    <br><small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Foto -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="foto">Foto Alumni</label>
                                            <div class="col-md-9">
                                                <input type="file" id="foto" class="form-control" name="foto"
                                                    accept="image/*">
                                                <small class="text-muted">Format: jpg, jpeg, png. Maks: 2MB</small>
                                                @error('foto')
                                                    <br><small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Import Excel -->
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="excel">Import Excel</label>
                                            <div class="col-md-9 d-flex align-items-center gap-2">
                                                <input type="file" id="excel" name="excel" class="form-control"
                                                    accept=".xlsx,.xls,.csv">

                                                <!-- Tombol mini panduan -->
                                                <button type="button" class="btn btn-info btn-sm ml-2"
                                                    title="Panduan Format Excel" data-toggle="modal"
                                                    data-target="#panduanExcelModal">
                                                    <i class="fa fa-info-circle"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-9 offset-md-3 mt-1">
                                                <small class="text-muted">Format: xlsx, xls, csv. Maks: 2MB</small><br>
                                                @error('excel')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>




                                    </div>

                                    <div class="form-actions center">
                                        <x-action.button href="{{ route('alumni.index') }}">Batal</x-action.button>
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

    <!-- Modal Panduan Format Excel -->
<div class="modal fade" id="panduanExcelModal" tabindex="-1" role="dialog" aria-labelledby="panduanExcelLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="panduanExcelLabel">
                    <i class="fa fa-info-circle"></i> Panduan Format Excel
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Pastikan file Excel Anda memiliki kolom dengan nama sebagai berikut
                    <strong>(menggunakan huruf kecil dan underscore jika ada spasi)</strong>:</p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kolom Excel</th>
                            <th>Deskripsi</th>
                            <th>Contoh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>nama_alumni</code></td>
                            <td>Nama lengkap alumni</td>
                            <td>Ahmad Fauzan</td>
                        </tr>
                        <tr>
                            <td><code>jabatan</code></td>
                            <td>Nama jabatan (harus sesuai dengan database)</td>
                            <td>Ketua Umum</td>
                        </tr>
                        <tr>
                            <td><code>periode</code></td>
                            <td>Periode menjabat alumni</td>
                            <td>2020-2021</td>
                        </tr>
                    </tbody>
                </table>

                <hr>
                <p><strong>Contoh Format Excel:</strong></p>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered text-center">
                        <thead class="bg-light">
                            <tr>
                                <th><code>nama_alumni</code></th>
                                <th><code>jabatan</code></th>
                                <th><code>periode</code></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ahmad Fauzan</td>
                                <td>Ketua Umum</td>
                                <td>2020-2021</td>
                            </tr>
                            <tr>
                                <td>Siti Aminah</td>
                                <td>Wakil Ketua</td>
                                <td>2021-2022</td>
                            </tr>
                            <tr>
                                <td>Rizky Maulana</td>
                                <td>Sekretaris</td>
                                <td>2022-2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p><strong>Catatan:</strong></p>
                <ul>
                    <li>Nama jabatan harus <strong>persis</strong> seperti yang tersedia di sistem.</li>
                    <li>Jangan mengubah <code>header</code> nama kolom Excel.</li>
                    <li>File harus berekstensi <code>.xlsx</code>, <code>.xls</code>, atau <code>.csv</code>.</li>
                </ul>
            </div>
        </div>
    </div>
</div>


@endsection
