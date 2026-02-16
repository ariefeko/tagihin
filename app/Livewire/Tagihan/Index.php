<?php

namespace App\Livewire\Tagihan;

use Livewire\Component;
use App\Models\Tagihan;

class Index extends Component
{
    public function render()
    {
        return view('livewire.tagihan.index', [
            'tagihans' => Tagihan::with('customer')
                ->latest()
                ->get(),
        ])->layout('layouts.app');
    }
    
    public function toggleBayar($id)
    {
        $tagihan = \App\Models\Tagihan::findOrFail($id);
        $tagihan->status_bayar = !$tagihan->status_bayar;
        $tagihan->save();
    }
}
