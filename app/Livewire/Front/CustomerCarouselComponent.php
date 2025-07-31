<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\Customer;

class CustomerCarouselComponent extends Component
{
    public function render()
    {
        $customers = Customer::all();
        return view('livewire.front.customer-carousel-component', compact('customers'))
            ->extends('front.layouts.base');
    }
}
