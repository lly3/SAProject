<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Material extends Model
{
    use HasFactory, Sortable;

    public function boms() {
        return $this->belongsToMany(Bom::class);
    }
}
