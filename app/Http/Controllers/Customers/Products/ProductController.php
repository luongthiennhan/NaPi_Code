<?php

namespace App\Http\Controllers\Customers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    private $product;
    private $category;

    public function __construct(Product $product, Category $category) {
        $this->product = $product;
        $this->category = $category;
    }

    public function getNewProduct() {
        $data =Product::orderBy('id', 'desc')->take(3)->get();    
        return view('customers.home',compact('data'));
    }

    public function get() {
        $data =Product::orderBy('id', 'desc')->get();
        return view('customers.product',compact('data'));
    }

    public function getDetailProduct(Request $request, $id) {
        $data = Product::with('category')->with('getImage')->where('id', $id)->get();
        foreach ($data as $ar) {
            foreach ($ar->category as $item) {
                $idCategory = $item->id;
            }
        }
        $array =$this->product->getproductHasIdCategory($idCategory)->where('id', '<>', $id)->get();
        return view('customers.detailProduct',compact('data', 'array'));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }  
}
