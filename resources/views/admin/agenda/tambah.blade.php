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
                                <form class="form form-horizontal" action="/tambah_agenda" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Judul</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="judul"
                                                            class="form-control border-primary" placeholder="Judul Agenda"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Tanggal</label>
                                                    <div class="col-md-9">
                                                        <input type="date" name="tanggal"
                                                            class="form-control border-primary" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Waktu</label>
                                                    <div class="col-md-9">
                                                        <input type="time" name="waktu"
                                                            class="form-control border-primary" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Lokasi</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="lokasi"
                                                            class="form-control border-primary" placeholder="Lokasi Agenda"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Deskripsi</label>
                                                    <div class="col-md-9">
                                                        <textarea name="deskripsi" class="form-control border-primary" rows="5" placeholder="Deskripsi Agenda" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Status</label>
                                                    <div class="col-md-9">
                                                        <select name="status" class="form-control border-primary" required>
                                                            <option value="Akan Datang">Akan Datang</option>
                                                            <option value="Berlangsung">Berlangsung</option>
                                                            <option value="Selesai">Selesai</option>
                                                        </select>
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
