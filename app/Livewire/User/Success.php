<?php

namespace App\Livewire\User;

use App\Models\Order;
use Livewire\Component;

class Success extends Component
{
    public function render()
    {
        $latest_order = Order::with('address')->where('user_id',auth()->user()->id)->latest()->first();
        return view('livewire.user.success',[
            'order' => $latest_order,
        ]);
    }
}
