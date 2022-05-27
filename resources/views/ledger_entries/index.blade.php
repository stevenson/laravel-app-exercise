<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <section class="overflow-hidden text-gray-700 ">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
            <div class="flex flex-wrap -m-1 md:-m-2">

                @unless(count($ledgerEntries) == 0)
                    @foreach ($ledgerEntries as $entry)
                        <x-ledger_card :entry="$entry" />
                    @endforeach
                @else
                    <p>no listings found</p>
                @endunless
            </div>
        </div>
    </section>
</x-layout>
