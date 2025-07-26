@extends('admin.layout.app')
@section('title', 'Edit Surat Masuk')
@section('breadcrumb1', 'Surat')
@section('breadcrumb2', 'Surat Masuk')

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
                                <li class="breadcrumb-item"><a href="{{ route('surat.masuk.index') }}">@yield('breadcrumb1')</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('surat.masuk.index') }}">@yield('breadcrumb2')</a>
                                </li>
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
                            <h4 class="card-title">Edit Data Surat Masuk</h4>
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form action="{{ route('surat.masuk.update', $suratMasuk->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-body">
                                        <div class="row">
                                            {{-- KIRI --}}
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Nomor Surat</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="nomor_surat"
                                                            class="form-control border-primary @error('nomor_surat') is-invalid @enderror"
                                                            value="{{ old('nomor_surat', $suratMasuk->nomor_surat) }}"
                                                            placeholder="Nomor Surat" required>
                                                        @error('nomor_surat')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Tanggal Surat</label>
                                                    <div class="col-md-9">
                                                        <input type="date" name="tanggal_surat"
                                                            class="form-control border-primary @error('tanggal_surat') is-invalid @enderror"
                                                            value="{{ old('tanggal_surat', \Carbon\Carbon::parse($suratMasuk->tanggal_surat)->format('Y-m-d')) }}"
                                                            required>
                                                        @error('tanggal_surat')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Pengirim</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="pengirim"
                                                            class="form-control border-primary @error('pengirim') is-invalid @enderror"
                                                            value="{{ old('pengirim', $suratMasuk->pengirim) }}"
                                                            placeholder="Pengirim Surat" required>
                                                        @error('pengirim')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- KANAN --}}
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Perihal</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="perihal"
                                                            class="form-control border-primary @error('perihal') is-invalid @enderror"
                                                            value="{{ old('perihal', $suratMasuk->perihal) }}"
                                                            placeholder="Perihal Surat" required>
                                                        @error('perihal')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- <div class="form-group row">
                                                    <label class="col-md-3 label-control">File Lampiran</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="file_lampiran"
                                                            class="form-control border-primary @error('file_lampiran') is-invalid @enderror"
                                                            accept=".pdf,.doc,.docx,.jpg,.png">
                                                        @if ($suratMasuk->file_lampiran)
                                                            <small>File saat ini:
                                                                <a
                                                                    href="{{ asset('storage/' . $suratMasuk->file_lampiran) }}"
                                                                    target="_blank">Lihat</a></small>
                                                        @endif
                                                        @error('file_lampiran')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div> --}}
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">File / Foto</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="file_lampiran"
                                                            class="form-control border-primary"
                                                            accept=".pdf,.jpg,.jpeg,.png">

                                                        @if ($suratMasuk->file_lampiran)
                                                            <a href="{{ asset('storage/' . $suratMasuk->file_lampiran) }}"
                                                                class="mt-2 d-block" target="_blank">
                                                                Lihat File / Foto
                                                            </a>

                                                            @php
                                                                $ext = pathinfo(
                                                                    $suratMasuk->file_lampiran,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                            @endphp

                                                            @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png']))
                                                                <img src="{{ asset('storage/' . $suratMasuk->file_lampiran) }}"
                                                                    alt="Foto Lampiran" class="img-thumbnail mt-2"
                                                                    style="max-width:200px;">
                                                            @endif
                                                        @endif

                                                        @error('file_lampiran')
                                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Status</label>
                                                    <div class="col-md-9">
                                                        <select name="status"
                                                            class="form-control border-primary @error('status') is-invalid @enderror"
                                                            required>
                                                            <option value="">-- Pilih Status --</option>
                                                            <option value="baru"
                                                                {{ old('status', $suratMasuk->status) == 'baru' ? 'selected' : '' }}>
                                                                Baru</option>
                                                            <option value="diproses"
                                                                {{ old('status', $suratMasuk->status) == 'diproses' ? 'selected' : '' }}>
                                                                Diproses</option>
                                                            <option value="selesai"
                                                                {{ old('status', $suratMasuk->status) == 'selesai' ? 'selected' : '' }}>
                                                                Selesai</option>
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
                                        <button type="button" class="btn btn-danger mr-1" onclick="window.history.back()">
                                            <i data-feather="x"></i> Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather="check-square"></i> Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
