<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
