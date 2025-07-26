@extends('admin.layout.app')
@section('title', 'Surat Masuk')
@section('breadcrumb1', 'Surat')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Detail @yield('title')</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('surat.masuk.index') }}">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                <section id="detail-surat">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title">Detail Surat Masuk</h4>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nomor Surat</th>
                                                            <td>{{ $suratMasuk->nomor_surat }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pengirim</th>
                                                            <td>{{ $suratMasuk->pengirim }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tanggal Surat</th>
                                                            <td>{{ \Carbon\Carbon::parse($suratMasuk->tanggal_surat)->format('d-m-Y') }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-6">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Perihal</th>
                                                            <td>{{ $suratMasuk->perihal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <td>
                                                                @if ($suratMasuk->status == 'baru')
                                                                    <span class="badge badge-primary">Baru</span>
                                                                @elseif ($suratMasuk->status == 'diproses')
                                                                    <span class="badge badge-warning">Diproses</span>
                                                                @elseif ($suratMasuk->status == 'selesai')
                                                                    <span class="badge badge-success">Selesai</span>
                                                                @else
                                                                    <span class="badge badge-secondary">Tidak Diketahui</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <hr>

                                        <h4>File Lampiran</h4>

                                        @if ($suratMasuk->file_lampiran)
                                            @php
                                                // Membuat URL lengkap file dari folder storage/app/public
                                                $filePath = asset('storage/' . $suratMasuk->file_lampiran);
                                                $extension = strtolower(pathinfo($suratMasuk->file_lampiran, PATHINFO_EXTENSION));
                                            @endphp

                                            {{-- Debug: Tampilkan link file --}}
                                            <p>Link file lampiran: <a href="{{ $filePath }}" target="_blank">{{ $filePath }}</a></p>

                                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                                {{-- Tampilkan gambar --}}
                                                <img src="{{ $filePath }}" alt="Lampiran" class="img-fluid" style="max-height: 500px;">
                                                <br><br>
                                                <a href="{{ $filePath }}" download class="btn btn-success">Download Gambar</a>

                                            @elseif ($extension === 'pdf')
                                                {{-- Tampilkan embed PDF --}}
                                                <embed src="{{ $filePath }}" type="application/pdf" width="100%" height="600px" />
                                                <br><br>
                                                <a href="{{ $filePath }}" download class="btn btn-success">Download PDF</a>

                                            @else
                                                {{-- Tombol download untuk tipe file lain --}}
                                                <a href="{{ $filePath }}" target="_blank" class="btn btn-info">Download Lampiran</a>
                                            @endif
                                        @else
                                            <p><em>Tidak ada file lampiran.</em></p>
                                        @endif

                                        <a href="{{ route('surat.masuk.index') }}" class="btn btn-secondary mt-3">Kembali</a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection
