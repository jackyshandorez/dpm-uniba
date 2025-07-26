<div class="col-12">
    {{-- notif --}}
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

    <div class="card">
        <div class="card-header">
            <h4 class="card-title" id="horz-layout-card-center">Data Dewan Perwakilan Mahasiswa</h4>
            <a class="heading-elements-toggle"><i data-feather="more-vertical" class="font-medium-3"></i></a>
            @include('components.ui.card')
        </div>
        @section('tabel-admin')



    </div>
</div>
