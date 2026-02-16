<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Daftar Tagihan</h1>

        <a href="/tagihan/create"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Tagihan Baru
        </a>
    </div>

    <div class="bg-white shadow rounded overflow-hidden">
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Customer</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Total</th>
                    <th class="p-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tagihans as $tagihan)
                    <tr class="border-t">
                        <td class="p-3">{{ $tagihan->customer->name }}</td>
                        <td class="p-3">{{ $tagihan->tanggal_masuk }}</td>
                        <td class="p-3">
                            Rp {{ number_format($tagihan->total, 0, ',', '.') }}
                        </td>
                        <td class="p-3">
                            <button wire:click="toggleBayar({{ $tagihan->id }})">
                                @if ($tagihan->status_bayar)
                                    <span class="text-green-600 font-semibold">Lunas</span>
                                @else
                                    <span class="text-red-600 font-semibold">Belum</span>
                                @endif
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            Belum ada tagihan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
