@section('table', 'tablefakultas')


@include('components.sweet-alert.simpan-data')

<div class="card">
    <div class="card-header">
        <h4 class="card-title" id="horz-layout-card-center">Data Fakultas</h4>
        <a class="heading-elements-toggle"><i data-feather="more-vertical" class="font-medium-3"></i></a>
        @include('components.ui.card')
    </div>
    <div class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                    @include('components.search.search')
                    <x-action.button href="{{ route('fakultas.create') }}">Tambah Fakultas</x-action>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="@yield('table')">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Fakultas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($fakultas as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        @include('components.action.action', [
                                            'item' => $item,
                                            'editRoute' => 'fakultas.edit',
                                            'destroyRoute' => 'fakultas.destroy',
                                            'prefix' => 'fakultas',
                                        ])
                                    </td>
                                </tr>
                            @endforeach

                            {{-- @if (session('success'))
                                @include('components.modal.modal-sukses', [
                                    'id' => 'successModal',
                                    'nama' => session('success'),
                                    'action' => '#',
                                ])
                            @endif --}}

                            <tr id="noDataRow" style="display: none;">
                                <td colspan="3" class="text-center text-muted">🔍 Data tidak ditemukan</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Fakultas</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.script.script')
