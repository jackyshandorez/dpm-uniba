<section id="dom">
    @include('components.sweet-alert.simpan-data')
    <div class="row">
        <div class="col-12">
            {{-- notif --}}
            {{-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="horz-layout-card-center">Data Jabatan</h4>
                    <a class="heading-elements-toggle"><i data-feather="more-vertical" class="font-medium-3"></i></a>
                    @include('components.ui.card')
                </div>

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                @include('components.search.search')
                                <x-action.button href="{{ route('jabatan.create') }}">Tambah Jabatan</x-action>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="@yield('table')">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jabatan</th>
                                            <th>Tanggung Jawab</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @foreach ($jabatan as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->nama_jabatan }}</td>
                                                <td>{{ $item->tanggung_jawab }}</td>
                                                <td>
                                                    @include('components.action.action', [
                                                        'item' => $item,
                                                        'editRoute' => 'jabatan.edit',
                                                        'destroyRoute' => 'jabatan.destroy',
                                                    ])
                                                </td>
                                            </tr>

                                            <!-- Modal Hapus -->
                                            {{-- @include('components.modal.modal-hapus', [
                                                'id' => $item->id,
                                                'nama' => $item->nama_jabatan,
                                                'action' => "/jabatan/{$item->id}",
                                            ]) --}}
                                        @endforeach

                                        @if (session('success'))
                                            @include('components.modal.modal-sukses', [
                                                'id' => 'successModal',
                                                'nama' => session('success'),
                                                'action' => '#',
                                            ])
                                        @endif

                                        <tr id="noDataRow" style="display: none;">
                                            <td colspan="5" class="text-center text-muted">🔍 Data tidak
                                                ditemukan</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jabatan</th>
                                            <th>Tanggung Jawab</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</section>
