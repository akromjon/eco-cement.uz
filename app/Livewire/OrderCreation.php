<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class OrderCreation extends Component
{
    public function render()
    {
        $orders = Client::whereHas('sales')->get();

        return view('livewire.order-creation', ['orders' => $orders]);
    }
}
