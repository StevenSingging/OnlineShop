<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Order')]
class Listorder extends Component
{
    use WithPagination;

    public $perpage = 5;
    public $search = '';
    public $status;

    public function updatePaymentStatus($order_id, $status)
    {
        $order = Order::find($order_id);

        if ($order) {
            $order->update(['payment_status' => $status]);
            session()->flash('message', 'Payment status updated successfully.');
        } else {
            session()->flash('error', 'Order not found.');
        }
    }

    public function updateStatus($order_id, $status)
    {
        $order = Order::find($order_id);

        if ($order) {
            $order->update(['status' => $status]);
            session()->flash('message', 'Status updated successfully.');
        } else {
            session()->flash('error', 'Order not found.');
        }
    }

    public function delete(int $order_id)
    {
        if($order_id){
            $data = Order::find($order_id);
            $data->delete();
            session()->flash('message','Data Deleted Successfully');
            return redirect()->to('/order-admin/list');
        }
    }

    public function render()
    {
        return view('livewire.admin.order.listorder', [
            'orders' => Order::search($this->search)->paginate($this->perpage)
        ]);
    }
}
