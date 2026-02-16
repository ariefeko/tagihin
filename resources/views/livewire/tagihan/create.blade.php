<div class="max-w-xl mx-auto p-4">

    @if (session()->has('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="simpan" class="space-y-4">

        {{-- Customer --}}
        <div>
            <label class="block">Customer</label>
            <select wire:model="customer_id" class="w-full border p-2">
                <option value="">-- pilih customer --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
            @error('customer_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Tanggal --}}
        <div>
            <label class="block">Tanggal Masuk</label>
            <input type="date" wire:model="tanggal_masuk" class="w-full border p-2">
            @error('tanggal_masuk') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Berat --}}
        <div>
            <label class="block">Berat (kg)</label>
            <input type="number" step="0.01" wire:model="berat" class="w-full border p-2">
            @error('berat') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Harga --}}
        <div>
            <label class="block">Harga / kg</label>
            <input type="number" step="0.01" wire:model="harga_per_kg" class="w-full border p-2">
            @error('harga_per_kg') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        {{-- Total --}}
        <div>
            <label class="block">Total</label>
            <input type="text" value="{{ number_format($total, 0, ',', '.') }}" readonly class="w-full border p-2 bg-gray-100">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2">
            Simpan Tagihan
        </button>
    </form>
</div>
