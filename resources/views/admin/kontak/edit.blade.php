@extends('admin.layout.app')
@section('title', 'Edit Kontak')
@section('breadcrumb1', 'Pengaturan')

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
                                <li class="breadcrumb-item"><a href="#">@yield('breadcrumb1')</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section id="edit-kontak">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Form Edit Kontak DPM UNIBA</h4>
                                    <a class="heading-elements-toggle"><i data-feather="more-vertical" class="font-medium-3"></i></a>
                                    @include('components.ui.card')
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('kontak.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $kontak->nama) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $kontak->email) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="whatsapp">WhatsApp</label>
                                                <input type="text" id="whatsapp" name="whatsapp" class="form-control" value="{{ old('whatsapp', $kontak->whatsapp) }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="lokasi">Lokasi</label>
                                                <textarea id="lokasi" name="lokasi" class="form-control" rows="2">{{ old('lokasi', $kontak->lokasi) }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="link_facebook">Link Facebook</label>
                                                <input type="url" id="link_facebook" name="link_facebook" class="form-control" value="{{ old('link_facebook', $kontak->link_facebook) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="link_instagram">Link Instagram</label>
                                                <input type="url" id="link_instagram" name="link_instagram" class="form-control" value="{{ old('link_instagram', $kontak->link_instagram) }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="link_youtube">Link YouTube</label>
                                                <input type="url" id="link_youtube" name="link_youtube" class="form-control" value="{{ old('link_youtube', $kontak->link_youtube) }}">
                                            </div>

                                            <div class="d-flex justify-content-between mt-3">
                                                <x-action.button>Simpan</x-button>
                                                <x-action.button type="button" onclick="window.history.back()">Kembali</x-button>
                                            </div>
                                        </form>

                                        @if (session('success'))
                                            @include('components.modal.modal-sukses', [
                                                'id' => 'successModal',
                                                'nama' => session('success'),
                                                'action' => '#',
                                            ])
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

    <script>
        $(document).ready(function() {
            @if (session('success'))
                $('#modalSukses').modal('show');
            @endif
        });
    </script>

    @include('components.script.script')
@endsection
