<?php

namespace App\Livewire\User;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('My Order')]
class MyordersPage extends Component
{
    use WithPagination;
    public function render()
    {
        $my_orders = Order::where('user_id', auth()->id())->latest()->paginate(5);
        return view('livewire.user.myorders-page',[
            'orders' => $my_orders
        ]);
    }
}
