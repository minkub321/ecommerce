<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
        $products = Product::latest()->get();
        return view('admin.allproducts',compact('products'));
    }
   
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get(); 

        return view('admin.addproducts', compact('categories', 'subcategories')); 
    }

    public function StoreProduct(Request $request){
       $request->validate([
                'product_name'=>'required|unique:products',
                'price'=>'required',
                'quantity'=>'required',
                'product_short_des'=>'required',
                'product_long_des'=>'required',
                'product_category_id'=>'required',
                'product_subcategory_id'=>'required',
                'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
            'product_img' => $img_url,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
        ]);

        Category::where('id', $category_id)->increment('product_count', 1);
        SubCategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproducts')->with('message', 'Product added successfully');
    }

    public function EditProductimg($id){
        $productinfo =Product::findOrFail($id);
         return view('admin.editproductimg', compact('productinfo')); 
    }


    public function UpdateProductimg(Request $request){
          $request->validate([
              
                'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = $request->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        Product::findOrFail($id)->update([
              'product_img' => $img_url,
        ]);
        return redirect()->route('allproducts')->with('message', 'Product image successfully');
    }

    public function EditProduct($id){
        $productinfo = Product::findOrFail($id);
        return view('admin.editproduct',compact('productinfo'));
    }

    public function UpdateProduct(Request $request){
        $productid = $request->id;
          $request->validate([
                'product_name'=>'required|unique:products',
                'price'=>'required',
                'quantity'=>'required',
                'product_short_des'=>'required',
                'product_long_des'=>'required',
           
        ]);
            Product::findOrFail($productid)->update([
 'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            ]);
            return redirect()->route('allproducts')->with('message', 'Product information update successfully');
    }


    public function Deleteproduct($id){
        Product::findOrFail($id)->delete();
        $cat_id = Product::where('id',$id)->value('product_category_id');
        $subcat_id = Product::where('id',$id)->value('product_subcategory_id');

        Category::where('id',$cat_id)->decrement('product_count',1);
        SubCategory::where('id',$subcat_id)->decrement('product_count',1);

        return redirect()->route('allproducts')->with('message', 'Product delete successfully');
    }

}
