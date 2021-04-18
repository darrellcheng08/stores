<?php

namespace App;

class Product extends MyModel
{
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo("App\Category", 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
}