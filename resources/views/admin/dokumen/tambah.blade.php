@extends('admin.layout.app')
@section('title', 'Dokumen')
@section('breadcrumb1', 'Laporan')
@section('breadcrumb2', 'Tambah Dokumen')

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
                            <h4 class="card-title" id="horz-layout-colored-controls">Isi @yield('breadcrumb2')
                            </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                        class="font-medium-3"></i></a>
                                @include('components.ui.card')
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('dokumen.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Judul</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="judul"
                                                            class="form-control border-primary" placeholder="Judul Dokumen"
                                                            required>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group row">
                                                    <label class="col-md-3 label-control">Slug</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="slug" class="form-control border-primary" placeholder="Slug Dokumen" required>
                                                    </div>
                                                </div> --}}

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Deskripsi</label>
                                                    <div class="col-md-9">
                                                        <textarea name="deskripsi" class="form-control border-primary" rows="3" placeholder="Deskripsi Dokumen" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Penulis</label>
                                                    <div class="col-md-9">
                                                        <input type="text" name="penulis"
                                                            class="form-control border-primary"
                                                            placeholder="Penulis Dokumen" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Tanggal Terbit</label>
                                                    <div class="col-md-9">
                                                        <input type="date" name="tanggal_terbit"
                                                            class="form-control border-primary" required>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Gambar</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="gambar"
                                                            class="form-control border-primary" accept="image/*">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">File</label>
                                                    <div class="col-md-9">
                                                        <input type="file" name="file"
                                                            class="form-control border-primary" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Status</label>
                                                    <div class="col-md-9">
                                                        <select name="status" class="form-control border-primary" required>
                                                            <option value="draft">Draft</option>
                                                            <!-- Sesuaikan dengan nilai yang diterima di controller -->
                                                            <option value="publish">Publish</option>
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




@endsection
