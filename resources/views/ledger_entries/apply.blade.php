<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Application of Product</h2>
            <p class="mb-4">Post an action towards product</p>
        </header>
        <form method="POST" action="/ledgerEntries" enctype="multipart/form-data">
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
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="quantity"
                    value="{{ old('quantity') }}" />
                @error('price')
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
    </x-card>
</x-layout>
