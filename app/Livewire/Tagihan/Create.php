<?php

namespace App\Livewire\Tagihan;

use Livewire\Component;
use App\Models\Tagihan;
use App\Models\Customer;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Create extends Component
{
    public $customer_id;
    public $tanggal_masuk;
    public $berat;
    public $harga_per_kg;
    public $total = 0;

    public function updated($field)
    {
        // hitung total otomatis saat berat / harga berubah
        if (in_array($field, ['berat', 'harga_per_kg'])) {
            $this->total = (float)$this->berat * (float)$this->harga_per_kg;
        }
    }

    public function simpan()
    {
        $this->validate([
            'customer_id'   => 'required|exists:customers,id',
            'tanggal_masuk' => 'required|date',
            'berat'         => 'required|numeric|min:0',
            'harga_per_kg'  => 'required|numeric|min:0',
        ]);

        Tagihan::create([
            'customer_id'   => $this->customer_id,
            'tanggal_masuk' => $this->tanggal_masuk,
            'berat'         => $this->berat,
            'harga_per_kg'  => $this->harga_per_kg,
            'total'         => $this->total,
            'status_bayar'  => false,
        ]);

        // reset form setelah simpan
        $this->reset(['customer_id', 'tanggal_masuk', 'berat', 'harga_per_kg', 'total']);

        session()->flash('success', 'Tagihan berhasil disimpan.');
    }

    public function render()
    {
        return view('livewire.tagihan.create', [
            'customers' => Customer::orderBy('name')->get(),
        ]);
    }

}
