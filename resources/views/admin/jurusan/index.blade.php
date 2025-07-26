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
                    <h4 class="card-title" id="horz-layout-card-center">Data Jurusan</h4>
                    <a class="heading-elements-toggle"><i data-feather="more-vertical" class="font-medium-3"></i></a>
                    @include('components.ui.card')
                </div>

                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                @include('components.search.search')
                                <x-action.button href="{{ route('jurusan.create') }}">Tambah Jurusan</x-action>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="@yield('table')">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Jurusan</th>
                                            <th>Fakultas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @forelse ($jurusan as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->kode }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ optional($item->fakultas)->nama ?? 'Tidak tersedia' }}</td>
                                                <td>
                                                    @include('components.action.action', [
                                                        'item' => $item,
                                                        'editRoute' => 'jurusan.edit',
                                                        'destroyRoute' => 'jurusan.destroy',
                                                        'prefix' => 'jurusan',
                                                    ])
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">🔍 Tidak ada data
                                                    jurusan</td>
                                            </tr>
                                        @endforelse
                                        <!-- Modal Sukses -->
                                        @if (session('success'))
                                            @include('components.modal.modal-sukses', [
                                                'id' => 'successModal',
                                                'nama' => session('success'),
                                                'action' => '#', // action tidak diperlukan karena ini hanya info sukses
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
                                            <th>Kode</th>
                                            <th>Nama Jurusan</th>
                                            <th>Fakultas</th>
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
