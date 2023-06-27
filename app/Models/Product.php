<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartItem;
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
