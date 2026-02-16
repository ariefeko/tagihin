<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;

class Index extends Component
{
    public $name, $phone, $address;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:2',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        Customer::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        // reset form
        $this->reset(['name', 'phone', 'address']);
    }

    public function render()
    {
        $customers = Customer::latest()->get();

        return view('livewire.customers.index', [
            'customers' => $customers,
        ])->layout('layouts.app');
    }
    
    public $editId = null;
    
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        $this->editId = $id;
        $this->name = $customer->name;
        $this->phone = $customer->phone;
        $this->address = $customer->address;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:2',
        ]);

        Customer::findOrFail($this->editId)->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        $this->reset(['editId', 'name', 'phone', 'address']);
    }

    public function delete($id)
    {
        Customer::findOrFail($id)->delete();
    }
}
