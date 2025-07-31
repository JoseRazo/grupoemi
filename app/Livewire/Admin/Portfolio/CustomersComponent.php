<?php

namespace App\Livewire\Admin\Portfolio;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Customer;

class CustomersComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $customer_id, $name, $phone, $web, $logo, $isOpen = false, $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteCustomer' => 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $customers = Customer::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.portfolio.customers-component', compact('customers'))
            ->extends('back.layouts.base')
            ->section('content');
    }

    public function create()
    {
        $this->resetForm();
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $this->customer_id = $customer->id;
        $this->name = $customer->name;
        $this->phone = $customer->phone;
        $this->web = $customer->web;
        $this->logo = null;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3|unique:customers,name,' . $this->customer_id,
            'logo' => 'nullable|image|max:6144',
            'phone' => 'nullable|string|max:20',
            'web' => 'nullable|url|max:255',
        ]);

        $logoPath = null;

        if ($this->logo) {
            if ($this->customer_id) {
                $existing = Customer::find($this->customer_id);
                if ($existing && $existing->logo && \Storage::disk('public')->exists($existing->logo)) {
                    \Storage::disk('public')->delete($existing->logo);
                }
            }

            $logoPath = $this->logo->store('customer-logos', 'public');
        }

        Customer::updateOrCreate(
            ['id' => $this->customer_id],
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'web' => $this->web,
                'logo' => $logoPath ?? ($this->customer_id ? Customer::find($this->customer_id)->logo : null),
            ]
        );

        session()->flash('message', $this->customer_id ? 'Cliente actualizado correctamente.' : 'Cliente creado correctamente.');
        $this->closeModal();
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer->logo && \Storage::disk('public')->exists($customer->logo)) {
            \Storage::disk('public')->delete($customer->logo);
        }

        $customer->delete();
        session()->flash('message', 'Cliente eliminado correctamente.');
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeleteCustomer', $id);
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['customer_id', 'name', 'phone', 'web', 'logo']);
    }
}
