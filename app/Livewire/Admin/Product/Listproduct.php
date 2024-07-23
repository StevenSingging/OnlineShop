<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Title('Product')]
class Listproduct extends Component
{
    use WithFileUploads, WithPagination;

    public $name;
    public $category_id;
    public $images = [];
    public $newimages = [];
    public $slug;
    public $slug1;
    public $price;
    public $stock;
    public $description;
    public $perpage = 5;
    public $search = '';
    public $product_id;
    public $updatedImages;

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg|max:1024',
        ]);
        // Array untuk menyimpan jalur gambar
        $storedImages = [];
        foreach ($this->images as $image) {
            $storedImages[] = $image->store('product', 'public');
        }
        $product = new Product();
        $product->name = $this->name;
        $product->slug  = $this->slug;
        $product->category_id = $this->category_id;
        $product->price = $this->price;
        $product->stock = $this->stock;
        $product->description = $this->description;
        $product->images = $storedImages;
        $product->save();

        session()->flash('message', 'Data Created Successfully');

        $this->reset();

        return redirect()->to('/product-admin/list');
    }

    public function edit(int $product_id)
    {
        $product = Product::find($product_id);
        if ($product) {
            $this->category_id = $product->category_id;
            $this->name = $product->name;
            $this->slug = $product->slug;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->stock = $product->stock;
            $this->images = $product->images;
        } else {
            return redirect()->to('/product-admin/list');
        }
    }

    public function updateproduct(int $product_id)
    {
        // Validasi data
        $this->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'images.*' => 'nullable|image|mimes:jpg,jpeg|max:1024',
        ]);

        $product = Product::findOrFail($product_id);

         // Array untuk menyimpan jalur gambar
         $storedImages = [];
         foreach ($this->images as $image) {
             $storedImages[] = $image->store('product', 'public');
         }

        $product->update([
            'name' => $this->name,
            'slug' => $this->slug1,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'images' => $storedImages
        ]);

        session()->flash('message', 'Data Updated Successfully');
        $this->reset();
        return redirect()->to('/product-admin/list');
    
    }

    public function delete(int $product_id)
    {
        if ($product_id) {
            $data = Product::find($product_id);
            $data->delete();
            session()->flash('message', 'Data Deleted Successfully');
            return redirect()->to('/product-admin/list');
        }
    }

    public function render()
    {
        return view('livewire.admin.product.listproduct', [
            'categories' => Category::all(),
            'products' => Product::search($this->search)->paginate($this->perpage)
        ]);
    }

    public function checkslug()
    {
        $validatedData = request()->validate([
            'name' => 'required|string',
        ]);

        $chkslug = SlugService::createSlug(Product::class, 'slug', $validatedData['name']);
        return response()->json(['slug' => $chkslug]);
    }
}
