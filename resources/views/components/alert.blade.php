@props(['type'])

@php
$classes = [
    'info' => 'mb-4 text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400',
    'danger' => 'mb-4 text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400',
    'success' => 'mb-4 text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400',
    'warning' => 'mb-4 text-yellow-800 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300',
    'default' => 'text-gray-800 bg-gray-50 dark:bg-gray-800 dark:text-gray-300',
];

$class = $classes[$type] ?? $classes['default'];
@endphp

<div {{ $attributes->merge(['class' => "p-4 text-sm rounded-lg {$class}"]) }} role="alert">
    <x-slot:title class="font-medium">Tsete</x-slot:title>
    {{ $slot }}
</div>
