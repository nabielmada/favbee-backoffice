<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = "detail_product";

    public function Product()
    {
    	return $this->belongsTo(Product::class);
    }
}
