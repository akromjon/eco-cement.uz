<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class OrderCreation extends Component
{
    public function render()
    {
        $clients = Client::whereHas('sales')->get();

        return view('livewire.order-creation', ['clients' => $clients]);
    }
}
