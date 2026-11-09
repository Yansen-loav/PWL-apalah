@props(['status'])

@php
    $statusClass = match (strtolower($status)) {
        'active', 'aktif' => 'bg-green-100 text-green-700',
        'inactive', 'nonaktif' => 'bg-red-100 text-red-700',
        default => 'bg-gray-100 text-gray-700',
    };
@endphp

<span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $statusClass }}">
    {{ $status }}
</span>