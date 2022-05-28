<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Application of Product</h2>
            <p class="mb-4">Post an action towards product</p>
        </header>
        <h1 class="text-center text-2xl font-bold uppercase mb-1">
            @unless(session()->has('message'))
                Remaining Product: {{ $runningCount }}
            @else
                Remaining Product: {{ session('runningCount') }}
            @endunless
        </h1>
        <form method="POST" action="/ledger/store" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="type" class="inline-block text-lg mb-2">Action Type</label>
                <select disabled name="type" class="border border-gray-200 rounded p-2 w-full" required>
                    <option value="Purchase">Purchase</option>
                    <option value="Application" selected>Application</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="quantity" class="inline-block text-lg mb-2">Quantity</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="quantity" value="0" />
                @error('quantity')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Submit
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>

        </form>
        @if(session()->has('fulfilled'))
            <div class="mb-6">
                <div class="inline-block text-lg mb-2">Purchased Rate:</div>
                <ul>
                @foreach (session('fulfilled') as $fulfilment)
                    <li>{{ $fulfilment['quantity']}} at ${{ $fulfilment['price']}}</li>
                @endforeach</ul>
            </div>
        @endif
    </x-card>
</x-layout>
