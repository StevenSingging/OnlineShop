<?php

namespace App\Livewire\User;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Category;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

#[Title('Home User')]
class Dashboard extends Component
{

    use WithPagination;
    use LivewireAlert;

    #[Url]
    public $selected_categories = [];

    #[Url]
    public $price_range = 300000;

    #[Url]
    public $sort = 'latest';

    #[Url]
    public $search = '';

     //add product to cart method
     public function addToCart($product_id){
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);

        $this->alert('success', 'Product added to the cart successfully', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
           ]);
    }

    public function render()
    {

        $productQuery = Product::query()->where('stock','>',0);

        if(!empty($this->selected_categories)){
            $productQuery->whereIn('category_id',$this->selected_categories);
        }

        if($this->sort == 'latest'){
            $productQuery->latest();
        }

        if($this->sort == 'price'){
            $productQuery->orderBy('price');
        }

        if($this->price_range){
            $productQuery->whereBetween('price',[0,$this->price_range]);
        }

        return view('livewire.user.dashboard',[
            'products' => $productQuery->search($this->search)->paginate(6),
            'categories' => Category::get(['id','name','slug'])
        ]);
    }
}
