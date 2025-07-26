    @extends('admin.layout.app')
    @section('title', 'Detail Pendaftar')
    @section('breadcrumb1', 'Manajemen')
    @section('breadcrumb2', 'Detail Pendaftar')

    @section('content')
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">Detail Pendaftar</h4>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <span class="text-muted">Tanggal Submit:</span>
                            <strong>{{ $submission->created_at->format('d M Y H:i') }}</strong>
                        </div>

                        @php
                            $fields = $submission->fields;
                            $count = count($fields);
                            $half = ceil($count / 2);
                        @endphp

                        @if ($count > 6)
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            @foreach ($fields->slice(0, $half) as $field)
                                                <tr>
                                                    <th style="width: 40%;">
                                                        {{ ucfirst(str_replace('_', ' ', $field->field_name)) }}</th>
                                                    <td>
                                                        @if (str_starts_with($field->value, 'pendaftaran_uploads/'))
                                                            <a href="{{ asset('storage/' . $field->value) }}"
                                                                target="_blank">Lihat</a>
                                                            |
                                                            <a href="{{ asset('storage/' . $field->value) }}"
                                                                download>Download</a>
                                                        @else
                                                            {{ $field->value }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <table class="table table-sm table-bordered">
                                        <tbody>
                                            @foreach ($fields->slice($half) as $field)
                                                <tr>
                                                    <th style="width: 40%;">
                                                        {{ ucfirst(str_replace('_', ' ', $field->field_name)) }}</th>
                                                    <td>
                                                        @if (str_starts_with($field->value, 'pendaftaran_uploads/'))
                                                            <a href="{{ asset('storage/' . $field->value) }}"
                                                                target="_blank">Lihat</a>
                                                            |
                                                            <a href="{{ asset('storage/' . $field->value) }}"
                                                                download>Download</a>
                                                        @else
                                                            {{ $field->value }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    @foreach ($fields as $field)
                                        <tr>
                                            <th style="width: 30%;">{{ ucfirst(str_replace('_', ' ', $field->field_name)) }}
                                            </th>
                                            <td>
                                                @if (str_starts_with($field->value, 'pendaftaran_uploads/'))
                                                    <a href="{{ asset('storage/' . $field->value) }}"
                                                        target="_blank">Lihat</a>
                                                    |
                                                    <a href="{{ asset('storage/' . $field->value) }}" download>Download</a>
                                                @else
                                                    {{ $field->value }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        <div class="mt-3">
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">
                                <i data-feather="arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
