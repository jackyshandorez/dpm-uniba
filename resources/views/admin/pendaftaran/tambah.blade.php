@extends('admin.layout.app')
@section('title', 'Rekrutmen Panitia')
@section('breadcrumb1', 'Manajemen')
@section('breadcrumb2', 'Buat Form Rekrutmen')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="col-md-6">
                <h3 class="content-header-title">@yield('breadcrumb2')</h3>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@yield('breadcrumb2')</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('oprek.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Judul Form</label>
                                <input type="text" name="judul" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Batas Akhir</label>
                                <input type="datetime-local" name="batas_akhir" class="form-control" required>
                            </div>

                            <hr>
                            <h5>Field Input yang Dibutuhkan</h5>
                            <div id="fields-container">
                                <div class="field-item row mb-2">
                                    <div class="col-md-3">
                                        <input type="text" name="fields[0][label]" class="form-control" placeholder="Label" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="fields[0][name]" class="form-control" placeholder="Name (unik)" required>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="fields[0][type]" class="form-control" required>
                                            <option value="text">Text</option>
                                            <option value="number">Number</option>
                                            <option value="email">Email</option>
                                            <option value="date">Date</option>
                                            <option value="textarea">Textarea</option>
                                            <option value="file">File</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="fields[0][required]" class="form-control" required>
                                            <option value="1">Wajib</option>
                                            <option value="0">Opsional</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-field">Hapus</button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-field" class="btn btn-secondary mb-3">+ Tambah Field</button>

                            <div class="form-actions">
                                <a href="{{ route('oprek.index') }}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let fieldIndex = 1;

    document.getElementById('add-field').addEventListener('click', function() {
        const container = document.getElementById('fields-container');
        const div = document.createElement('div');
        div.classList.add('field-item', 'row', 'mb-2');
        div.innerHTML = `
            <div class="col-md-3">
                <input type="text" name="fields[${fieldIndex}][label]" class="form-control" placeholder="Label" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="fields[${fieldIndex}][name]" class="form-control" placeholder="Name (unik)" required>
            </div>
            <div class="col-md-2">
                <select name="fields[${fieldIndex}][type]" class="form-control" required>
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="email">Email</option>
                    <option value="date">Date</option>
                    <option value="textarea">Textarea</option>
                    <option value="file">File</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="fields[${fieldIndex}][required]" class="form-control" required>
                    <option value="1">Wajib</option>
                    <option value="0">Opsional</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-field">Hapus</button>
            </div>
        `;
        container.appendChild(div);
        fieldIndex++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-field')) {
            e.target.closest('.field-item').remove();
        }
    });
});
</script>
@endsection
