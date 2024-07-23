<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'grand_total',
        'payment_method',
        'payment_status',
        'status',
        'shipping_amount',
        'shipping_method'
    ]; 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(Orderitem::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function scopeSearch($query, $value){
        $query->join('users', 'users.id', '=', 'orders.user_id')
          ->where('users.name', 'like', "%{$value}%")
          ->orWhere('payment_method', 'like', "%{$value}%");
    }
}
