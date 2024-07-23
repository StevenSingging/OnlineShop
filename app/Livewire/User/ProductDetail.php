<?php

namespace App\Livewire\User;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Product Detail')]
class ProductDetail extends Component
{
    use LivewireAlert;
    public $slug;
    public $quantity = 1;
    public $stock;

    public function mount($slug) {
        $this->slug = $slug;
        $this->stock = $this->getStockFromSlug($slug);
    }

    private function getStockFromSlug($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
        return $product->stock;
    }

    public function increaseQty(){
       if ($this->quantity < $this->stock) {
            $this->quantity++;
        }    
    }

    public function decreaseQty(){
        if($this->quantity > 1){
            $this->quantity--;
        }
    }

    public function addToCart($product_id){
        $total_count = CartManagement::addItemToCartWithQty($product_id, $this->quantity);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Product added to the cart successfully', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
           ]);
    }

    public function render()
    {
        return view('livewire.user.product-detail',[
            'product' => Product::where('slug',$this->slug)->firstOrFail(),
        ]);
    }
}
