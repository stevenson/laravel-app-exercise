@props(['entry'])
<x-card>
    <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">
        <a href="/ledger/{{ $entry->id }}">{{ $entry->id }}</a>
    </h5>
    <p class="text-gray-700 text-base mb-4">
        {{ $entry->type }}
    </p>
    <p class="text-gray-700 text-base mb-4">
        {{ $entry->quantity }}
    </p>
    <p class="text-gray-700 text-base mb-4">
        {{ $entry->price }}
    </p>
    <p class="text-gray-700 text-base mb-4">
        {{ $entry->bought_at }}
    </p>
</x-card>
