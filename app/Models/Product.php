<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product_Categories;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'description',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

    public function category() {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id' );
    }

    public function getImage() {
        return $this->hasMany(ImageProduct::class);
    }

    public function getIdProduct_categories() {
        return $this->hasMany(Product_Categories::class);
    }

    //lấy sản phẩm theo id của thể loại sản phẩm
    public function getproductHasIdCategory($idCategory) {
        return $this->whereHas('category', function($query) use($idCategory) {
            $query->where('categories.id', $idCategory);
        });
    }
}
