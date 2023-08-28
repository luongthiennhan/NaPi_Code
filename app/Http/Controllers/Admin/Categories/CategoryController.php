<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    private $product;
    private $category;

    public function __construct(Product $product, Category $category) {
        $this->product = $product;
        $this->category = $category;
    }

    public function get() {
        $categories = Category::select()->orderBy('id', 'desc')->get();
        return view('admin.categories.category',compact('categories'));
    }

    public function newCategory() {
        return view('admin.categories.create');
    }

    public function create(Request $request) {
        $request['slug'] = str_slug($request->slug, '-');
        $data = $request->validate([
            'name' => 'required | max:25 | min:2 |unique:categories,"name"',
            'slug'  => 'required|unique:categories,"slug"|max:191',
            'description' => 'required | max:250',
        ]);
            $create = Category::create([
                'id',
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'description' =>  $request-> input('description'),
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ]);          
            return redirect('/admin/categories')->with('success', 'Create a successful new category');
    }

    public function getCategorytEdit($id) {
        $categories = Category::find($id);
        return view('admin.categories.edit', compact('categories'));
    }

    public function updateCategory(Request $request) {
        $request['slug'] = str_slug($request->slug, '-');
        $data = $request->validate([
            'name' => 'required | max:25 | min:2 | unique:categories,name,'.$request->input('category_id'),
            'slug'  => 'required | max:191 | unique:categories,slug,'.$request->input('category_id'),
            'description' => 'required | max:250',
        ]);
        //save product
        $saverPoduct = Category::find($request->input('category_id'));
        $array = $request->all();
        $array['updated_at'] =  Carbon::now('Asia/Ho_Chi_Minh');
        $saverPoduct->update($array);
        return redirect('/edit/category/'.$request->input('category_id'))->with('success', 'Category Update Successful!');
    }

    public function destroy(Request $request, $id) {
        Category::where('id', $id)->delete();
        return redirect('/admin/categories')->with('success', 'Delete category successfully!');
    }
}
