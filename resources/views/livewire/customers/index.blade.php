<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Pelanggan</h1>
    
    {{-- FORM TAMBAH --}}
    <form wire:submit.prevent="save" class="mb-6 space-y-2">
        <input type="text" wire:model="name" placeholder="Nama"
            class="border p-2 w-full">

        <input type="text" wire:model="phone" placeholder="Telepon"
            class="border p-2 w-full">

        <textarea wire:model="address" placeholder="Alamat"
            class="border p-2 w-full"></textarea>

        @if ($editId)
            <button wire:click="update" class="bg-yellow-600 text-white px-4 py-2 rounded">
                Update
            </button>
        @else
            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        @endif
    </form>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Telepon</th>
                <th class="p-2 border">Alamat</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
                <tr>
                    <td class="p-2 border">{{ $customer->name }}</td>
                    <td class="p-2 border">{{ $customer->phone }}</td>
                    <td class="p-2 border">{{ $customer->address }}</td>
                    <td class="p-2 border space-x-2">
                        <button wire:click="edit({{ $customer->id }})"
                            class="bg-yellow-500 text-white px-2 py-1 rounded">
                            Edit
                        </button>

                        <button type="button"
                            onclick="confirm('Yakin hapus pelanggan ini?') || event.stopImmediatePropagation()"
                            wire:click="delete({{ $customer->id }})"
                            class="bg-red-600 text-white px-2 py-1 rounded">
                            Hapus
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">
                        Belum ada pelanggan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
