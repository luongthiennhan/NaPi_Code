<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $id;

    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'featured',
        'menu',
        'image',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

    public function product() {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');

    }

    //lấy thể loại theo id của sản phẩm
    public function getCategoryHasIdProduct($id) {
        return $this->whereHas('product', function($query) use($id) {
            $query->where('products.id', $id);
        });
    }
}
