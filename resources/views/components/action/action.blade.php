{{-- components/aksi.blade.php --}}
<div class="btn-group btn-group-sm" role="group">
    @isset($showRoute)
        <a href="{{ route($showRoute, ['id' => $item->id]) }}" class="btn btn-info">
            <i data-feather="eye"></i>
        </a>
    @endisset

    @isset($editRoute)
        <a href="{{ route($editRoute, ['id' => $item->id]) }}" class="btn btn-warning">
            <i data-feather="edit"></i>
        </a>
    @endisset

    @isset($destroyRoute)
        <button type="button" class="btn btn-danger"
                data-toggle="modal"
                data-target="#modalHapus{{ $prefix ?? '' }}{{ $item->id }}">
            <i data-feather="trash"></i>
        </button>

        @include('components.modal.modal-hapus', [
            'id' => ($prefix ?? '') . $item->id,
            'nama' => $item->nama,
            'action' => route($destroyRoute, $item->id),
        ])
    @endisset

        {{-- public function adminShow($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);

        // Kalau ingin juga menampilkan 5 berita lainnya di sidebar admin
        $beritaLainnya = Berita::where('id', '!=', $berita->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.berita.admin-show', compact('berita', 'beritaLainnya'));
    } --}}
</div>



