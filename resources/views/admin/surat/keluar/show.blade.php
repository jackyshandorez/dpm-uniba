@extends('admin.layout.app')
@section('title', 'Surat Keluar')
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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('surat.keluar.index') }}">@yield('breadcrumb1')</a></li>
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
                                    <h4 class="card-title">Detail Surat Keluar</h4>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nomor Surat</th>
                                                            <td>{{ $suratKeluar->nomor_surat }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tujuan</th>
                                                            <td>{{ $suratKeluar->tujuan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tanggal Surat</th>
                                                            <td>{{ \Carbon\Carbon::parse($suratKeluar->tanggal_surat)->format('d-m-Y') }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-6">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Perihal</th>
                                                            <td>{{ $suratKeluar->perihal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Status</th>
                                                            <td>
                                                                @if ($suratKeluar->status == 'baru')
                                                                    <span class="badge badge-primary">Baru</span>
                                                                @elseif ($suratKeluar->status == 'diproses')
                                                                    <span class="badge badge-warning">Diproses</span>
                                                                @elseif ($suratKeluar->status == 'selesai')
                                                                    <span class="badge badge-success">Selesai</span>
                                                                @else
                                                                    <span class="badge badge-secondary">Tidak
                                                                        Diketahui</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <hr>

                                        <h4>File Lampiran</h4>

                                        @if ($suratKeluar->file_lampiran)
                                            @php
                                                $filePath = asset('storage/' . $suratKeluar->file_lampiran);
                                                $extension = strtolower(
                                                    pathinfo($suratKeluar->file_lampiran, PATHINFO_EXTENSION),
                                                );
                                            @endphp

                                            <p>Link file lampiran:
                                                <a href="{{ $filePath }}" target="_blank">{{ $filePath }}</a>
                                            </p>

                                            @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp']))
                                                <img src="{{ $filePath }}" alt="Lampiran" class="img-fluid"
                                                    style="max-height: 500px;">
                                                <br><br>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ $filePath }}" download class="btn btn-success">Download
                                                        Gambar</a>
                                                    <a href="{{ route('surat.keluar.index') }}"
                                                        class="btn btn-secondary">Kembali</a>
                                                </div>
                                            @elseif ($extension === 'pdf')
                                                <embed src="{{ $filePath }}" type="application/pdf" width="100%"
                                                    height="600px" />
                                                <br><br>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ $filePath }}" download class="btn btn-success">Download
                                                        PDF</a>
                                                    <a href="{{ route('surat.keluar.index') }}"
                                                        class="btn btn-secondary">Kembali</a>
                                                </div>
                                            @else
                                                <div class="d-flex gap-2">
                                                    <a href="{{ $filePath }}" target="_blank"
                                                        class="btn btn-info">Download Lampiran</a>
                                                    <a href="{{ route('surat.keluar.index') }}"
                                                        class="btn btn-secondary">Kembali</a>
                                                </div>
                                            @endif
                                        @else
                                            <p><em>Tidak ada file lampiran.</em></p>
                                        @endif
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
