<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ImageProduct extends Model
{
    protected $id;

    use HasFactory;
    protected $table = 'image_product';
    protected $fillable = [
        'product_id',
        'image',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
}
