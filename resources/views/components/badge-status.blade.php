@props(['status'])

@if ($status == 'available')
    @php
        $colorStatus = 'success';
    @endphp
@elseif ($status == 'unavailable')
    @php
        $colorStatus = 'error';
    @endphp
@endif


@php
    $statusClasses = [
        'success' => 'bg-green-50 text-green-700 ring-green-600/20',
        'error' => 'bg-red-50 text-red-700 ring-red-600/20',
        'warning' => 'bg-yellow-50 text-yellow-700 ring-yellow-600/20',
        'info' => 'bg-blue-50 text-blue-700 ring-blue-600/20',
    ];
@endphp

<span
    class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset {{ $statusClasses[$colorStatus] }}">
    {{ $slot }}
</span>
