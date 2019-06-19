<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'sizes';

    protected $guarded = [];

    public function productDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }
}
