<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Title('Category')]
class Listcategory extends Component
{
    use WithFileUploads, WithPagination;
    public $name;
    public $slug;
    public $slug1;
    public $image;
    public $category_id;
    public $perpage = 5;
    public $search = '';
    public $newImage;

    

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'image|max:1024',
        ]);

        Category::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $this->image->store('category', 'public')
        ]);

        session()->flash('message','Data Created Successfully');
        // Optionally, reset the form fields
        $this->reset();

        return redirect()->to('/category-admin/list');
    }

    public function edit(int $category_id)
    {
        $category = Category::find($category_id);
        if ($category) {
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->image = $category->image;
        } else {
            return redirect()->to('/category-admin/list');
        }
    }

    public function update()
    {
        // Validasi data
        $this->validate([
            'name' => 'required',
            'newImage' => 'nullable|image|max:1024',
        ]);

        // Temukan kategori berdasarkan ID
        $category = Category::findOrFail($this->category_id);

        // Perbarui data kategori
        $category->update([
            'name' => $this->name,
            'slug' => $this->slug1,
            'image' => $this->newImage ? $this->newImage->store('category', 'public') : $category->image,
        ]);

        session()->flash('message','Data Updated Successfully');
        // Emit event untuk menutup modal dan reset field
        $this->reset();

        // Redirect ke halaman daftar kategori
        return redirect()->to('/category-admin/list');
    }

    public function delete(int $category_id)
    {
        if($category_id){
            $data = Category::find($category_id);
            $data->delete();
            session()->flash('message','Data Deleted Successfully');
            return redirect()->to('/category-admin/list');
        }
    }

    public function render()
    {
        return view('livewire.admin.category.listcategory', [
            'categories' => Category::search($this->search)->paginate($this->perpage)
        ]);
    }

    public function checkslug()
    {
        $validatedData = request()->validate([
            'name' => 'required|string',
        ]);

        $chkslug = SlugService::createSlug(Category::class, 'slug', $validatedData['name']);
        return response()->json(['slug' => $chkslug]);
    }
}
