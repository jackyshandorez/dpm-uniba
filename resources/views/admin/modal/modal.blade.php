<div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="hapusLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="hapusLabel{{ $item->id }}">
                    Konfirmasi Hapus</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah kamu yakin ingin menghapus jurusan
                    <strong>{{ $item->nama }}</strong>?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="/jurusan/{{ $item->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya,
                        Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- resources/views/admin/modal/modal.blade.php --}}
<!-- Modal Sukses -->
<div class="modal fade" id="modalSukses" tabindex="-1" role="dialog" aria-labelledby="modalSuksesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="modalSuksesLabel">Berhasil</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ session('success') }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

