<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_Categories;
use App\Models\ImageProduct;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use File;

class ProductController extends Controller
{

    private $product;
    private $category;

    public function __construct(Product $product, Category $category) {
        $this->product = $product;
        $this->category = $category;
    }

    public function get() {
        $data =Product::select()->orderBy('id', 'desc')->get();
        return view('admin.products.product',compact('data'));
    }

    public function newProduct() {
        $data = Category::select()->get();
        return view('admin.products.create', compact('data'));
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required | max:25 | min:2 |unique:products,"name"',
            'description' => 'required | max:250',
            'image'  => 'required| mimes:jpeg,png,jpg,gif',
            'images'  => 'required',
        ]);
        //save product
        $avata = $request->file('image')->getClientOriginalName();
         $request->file('image')->move('resources/img/',$avata);
            $newProduct = Product::create([
                'id',
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'image' => $avata,
                'description' =>  $request-> input('description'),
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
            //save avata
            ImageProduct::create([
                'id',
                'product_id' => $newProduct->id,
                'image' => $avata,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
            //save photo product
            foreach ($data['images'] as $image) {
                $file_name = $image->getClientOriginalName();
                if ($file_name == $avata) {
                    continue;
                }
                $image->move('resources/img/',$file_name);
               ImageProduct::create([
                'id',
                'product_id' => $newProduct->id,
                'image' => $file_name,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
               ]);
            }

            //save category product

            Product_Categories::create([
                'id',
                'category_id' => $request->input('category'),
                'product_id' => $newProduct->id,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
           
            return redirect('/admin/product')->with('success', 'Create a successful new product');
    }

    public function getProductEdit($id) {
        $product = Product::find($id);
        $category = $this->category->getCategoryHasIdProduct($id)->get();
        foreach ($category as $item) {
            $idCategory = $item->id;
        }
        $categories = Category::where('id', '<>', $idCategory)->get();
        return view('admin.products.edit', compact('product', 'category', 'categories' ));
    }

    public function updateProduct(Request $request) {
        $data = $request->validate([
            'name' => 'max:25 | min:2 | unique:products,name,'.$request->input('product_id'),
            'description' => 'max:250',
            'image'  => 'mimes:jpeg,png,jpg,gif | max:2024',
        ]);
        //save product
        $saverPoduct = Product::find($request->input('product_id'));
        $array = $request->all();
        if ( isset($request->image) ) {
             //save avata
             $imagesProduct = ImageProduct::select('image')->where('product_id', $request->input('product_id'))->get();
             $check = false;
             foreach ($imagesProduct as $i ) {
                 if ($i->image == $request->file('image')->getClientOriginalName())
                 {
                   $check = true;
                 }
             }
             if ($check == false) {
                ImageProduct::create([
                    'id',
                    'product_id' => $request->input('product_id'),
                    'image' =>  $request->file('image')->getClientOriginalName(),
                    'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
                   ]);
             }
           
            $array['image'] = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('resources/img/',$request->file('image')->getClientOriginalName());
        }
        $array['updated_at'] =  Carbon::now('Asia/Ho_Chi_Minh');
        $saverPoduct->update($array);

            //save category product
            $id = Product_Categories::select('id')->where('product_id', $request->input('product_id'))->get();
                Product_Categories::find($id)->first()->update([
                'category_id' => $request->input('category'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
              return redirect('/admin/product/edit/'.$request->input('product_id'))->with('success', 'Product Update Successful!');
    }

    public function destroy(Request $request, $id) {
        $data = ImageProduct::select('image')->where('product_id', $id)->get();
        foreach ($data as $ar) {
            $image_path = resource_path('img/'.$ar->image);
            if(File::exists($image_path)) {
            File::delete($image_path);
            }
        }
        Product::where('id', $id)->delete();
        return redirect('/admin/product')->with('success', 'Delete product successfully!');
    }

    public function getProductImages($id) {
        $images = ImageProduct::where('product_id',$id)->orderBy('id', 'desc')->get();
        $products = Product::where('id', $id)->get();
        $idProduct = $id;
        return view('admin.products.albumProduct', compact('images', 'idProduct', 'products'));
    }

    public function addImages(Request $request) {
        $data = $request->validate([
            'images'  => 'required',
        ]);
        $images = ImageProduct::select()->get();
            foreach ($data['images'] as $img) {
                $file_name = $img->getClientOriginalName();
                $img->move('resources/img/',$file_name);
               ImageProduct::create([
                'id',
                'product_id' => $request->input('id-product'),
                'image' => $file_name,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
               ]);
        }
        return redirect('/admin/product/album/'.$request->input('id-product'))->with('success', 'Successfully Added New Photo');
    }

    public function remoteImage(Request $request, $id, $productId, $image) {
        $image_path = resource_path('img/'.$image);
        if(File::exists($image_path)) {
          File::delete($image_path);
        }
        ImageProduct::where('id', $id)->delete();
        return redirect('/admin/product/album/'.$productId)->with('success', 'Delete Image successfully!');
    }
}
