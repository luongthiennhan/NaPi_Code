<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Categories extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = [
        'category_id',
        'product_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
}
