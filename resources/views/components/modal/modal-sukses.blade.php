{{-- resources/views/components/modal/simpan-data.blade.php --}}
<div class="modal fade" id="{{ $id ?? 'modalSuccess' }}" tabindex="-1" role="dialog"
    aria-labelledby="{{ $label ?? 'modalSuccessLabel' }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="{{ $label ?? 'modalSuccessLabel' }}">
                    {{ $title ?? 'Berhasil Disimpan' }}
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>{{ $message ?? 'Data berhasil disimpan!' }}</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@if ($show ?? false)
<script>
    $(document).ready(function () {
        $('#{{ $id ?? "modalSuccess" }}').modal('show');
    });
</script>
@endif
