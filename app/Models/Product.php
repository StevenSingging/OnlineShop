<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'category_id',
        'slug',
        'images',
        'description',
        'price',
        'stock'
    ]; 

    protected $casts = [
        'images' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function scopeSearch($query, $value){
        $query->where('name','like',"%{$value}%")->orWhere('slug','like',"%{$value}%");
    }
}
