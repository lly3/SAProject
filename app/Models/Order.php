<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory, Sortable;

    public $sortable = ['id', 'o_status', 'o_type', 'o_placing_date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('op_quantity', 'op_amount');
    }

    public function invoice() {
        return $this->hasOne(Invoice::class);
    }
}
