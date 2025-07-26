@extends('admin.layout.app')
@section('title', 'Tambah Agenda')
@section('breadcrumb1', 'Agenda & Kegiatan')
@section('breadcrumb2', 'Agenda')

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
                                <li class="breadcrumb-item"><a href="index.html">@yield('breadcrumb1')</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb2')</a>
                                </li>
                                <li class="breadcrumb-item active">@yield('title')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-colored-controls">Isi Data @yield('breadcrumb2')
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                        class="font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i data-feather="minus"></i></a></li>
                                        <li><a data-action="reload"><i data-feather="rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i data-feather="maximize"></i></a></li>
                                        <li><a data-action="close"><i data-feather="x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form form-horizontal" action="/agenda/{{ $agenda->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="judul">Judul Agenda</label>
                                            <div class="col-md-9">
                                                <input type="text" id="judul" class="form-control" placeholder="Contoh: Rapat DPM" name="judul" value="{{ $agenda->judul }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="deskripsi">Deskripsi Agenda</label>
                                            <div class="col-md-9">
                                                <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi kegiatan agenda" required>{{ $agenda->deskripsi }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="tanggal">Tanggal</label>
                                            <div class="col-md-9">
                                                <input type="date" id="tanggal" class="form-control" name="tanggal" value="{{$agenda->tanggal }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="waktu">Waktu</label>
                                            <div class="col-md-9">
                                                <input type="time" id="waktu" class="form-control" name="waktu" value="{{ $agenda->waktu }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="lokasi">Lokasi</label>
                                            <div class="col-md-9">
                                                <input type="text" id="lokasi" class="form-control" placeholder="Contoh: Ruang Rapat A" name="lokasi" value="{{ $agenda->lokasi }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="status">Status</label>
                                            <div class="col-md-9">
                                                <select name="status" class="form-control border-primary" required>
                                                    <option value="Akan Datang" {{ $agenda->status == 'Akan Datang' ? 'selected' : '' }}>Akan Datang</option>
                                                    <option value="Berlangsung" {{ $agenda->status == 'Berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                                    <option value="Selesai" {{ $agenda->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions center">
                                        <button type="button" class="btn btn-danger mr-1" onclick="window.history.back()">
                                            <i data-feather="x"></i> Batal
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather="check-square"></i> Simpan
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
