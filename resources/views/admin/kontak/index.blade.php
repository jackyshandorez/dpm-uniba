@extends('admin.layout.app')
@section('title', 'Kontak')
@section('breadcrumb1', 'Pengaturan')
@section('table', 'tableKontak')

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

            <div class="content-body">
                <section id="kontak-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Informasi Kontak DPM UNIBA</h4>
                                    <a class="heading-elements-toggle"><i data-feather="more-vertical"
                                            class="font-medium-3"></i></a>
                                    @include('components.ui.card')
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="d-flex flex-wrap align-items-center justify-content-end mb-2">
                                            <a href="{{ route('kontak.edit') }}" class="btn btn-primary btn-sm">
                                                <i data-feather="edit"></i> Edit Kontak
                                            </a>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered" id="@yield('table')">
                                                <tbody>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <td>{{ $kontak->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $kontak->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>WhatsApp</th>
                                                        <td><a href="https://wa.me/{{ $kontak->whatsapp }}" target="_blank">{{ $kontak->whatsapp }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Lokasi</th>
                                                        <td>{{ $kontak->lokasi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Facebook</th>
                                                        <td><a href="{{ $kontak->link_facebook }}" target="_blank">{{ $kontak->link_facebook }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Instagram</th>
                                                        <td><a href="{{ $kontak->link_instagram }}" target="_blank">{{ $kontak->link_instagram }}</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>YouTube</th>
                                                        <td><a href="{{ $kontak->link_youtube }}" target="_blank">{{ $kontak->link_youtube }}</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

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
