<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable;

    public $sortable = ['id', 'p_title', 'p_description', 'p_quantity', 'p_price', 'p_wood_type', 'p_size'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
