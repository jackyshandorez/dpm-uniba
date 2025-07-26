@props([
    'type' => 'button', // button, submit, reset
    'href' => null,
])

@php
    $label = strtolower(trim($slot));

    $preset = [
        'simpan' => ['icon' => 'check-square', 'class' => 'btn btn-primary', 'type' => 'submit'],
        'kembali' => ['icon' => 'arrow-left', 'class' => 'btn btn-secondary', 'type' => 'button'],
        'batal' => ['icon' => 'x', 'class' => 'btn btn-danger', 'type' => 'button'],
        'edit' => ['icon' => 'edit', 'class' => 'btn btn-warning', 'type' => 'button'],
        'hapus' => ['icon' => 'trash-2', 'class' => 'btn btn-danger', 'type' => 'submit'],
        'unduh' => ['icon' => 'download', 'class' => 'btn btn-success', 'type' => 'button'],
        'lihat' => ['icon' => 'eye', 'class' => 'btn btn-info', 'type' => 'button'],
        'update' => ['icon' => 'refresh-ccw', 'class' => 'btn btn-primary', 'type' => 'submit'],

    ];

    $icon = $preset[$label]['icon'] ?? 'help-circle';
    $class = $preset[$label]['class'] ?? 'btn btn-primary';
    $buttonType = $preset[$label]['type'] ?? $type;
    // Khusus untuk "Tambah ..."
    $isTambah = str_starts_with($label, 'tambah');
    $icon = $isTambah ? 'plus' : ($preset[$label]['icon'] ?? 'help-circle');
    $class = $isTambah ? 'btn btn-primary btn-sm' : ($preset[$label]['class'] ?? 'btn btn-primary');
    $buttonType = $isTambah ? 'button' : ($preset[$label]['type'] ?? $type);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>
        <i data-feather="{{ $icon }}"></i> {{ ucfirst($slot) }}
    </a>
@else
    <button type="{{ $buttonType }}" {{ $attributes->merge(['class' => $class]) }}>
        <i data-feather="{{ $icon }}"></i> {{ ucfirst($slot) }}
    </button>
@endif
