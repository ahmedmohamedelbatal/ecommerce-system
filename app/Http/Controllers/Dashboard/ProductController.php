<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index() {
    $products = Product::all();
    return view('dashboard.products.index', compact('products'));
  }

  public function show(int $id) {
    $product = Product::findorFail($id);
    return view('dashboard.products.show', compact('product'));
  }

  public function create() {
    $categories = Category::all();
    return view('dashboard.products.create', compact('categories'));
  }

  public function store(Request $request) {
    $request->validate([
      'product_name' => 'required',
      'product_price' => 'required | numeric',
      'category_id' => 'required',
      'product_status' => 'required',
    ]);

    Product::create([
      'product_name' => $request->product_name,
      'product_price' => $request->product_price,
      'category_id' => $request->category_id,
      'product_description' => $request->product_description,
      'product_status' => $request->product_status,
    ]);

    session()->flash('add', 'Product Added Successfully');
    return redirect()->route('products.index');
  }

  public function edit(int $id) {
    $categories = Category::all();
    $product = Product::find($id);
    return view('dashboard.products.edit', compact('categories', 'product'));
  }

  public function update(Request $request, int $id) {
    $request->validate([
      'product_name' => 'required',
      'product_price' => 'required | numeric',
      'category_id' => 'required',
      'product_status' => 'required',
    ]);

    $product = Product::findorFail($id);

    $product->update([
      'product_name' => $request->product_name,
      'product_price' => $request->product_price,
      'category_id' => $request->category_id,
      'product_description' => $request->product_description,
      'product_status' => $request->product_status,
    ]);

    session()->flash('edit', 'Product Updated Successfully');
    return redirect()->route('products.index');
  }

  public function upload_image(Request $request) {
    $request->validate([
      'product_image' => 'required | image | mimes:jpeg,png,jpg,webp',
    ]);

    $product = Product::findorFail($request->id);

    if ($request->hasFile('product_image')) {
      $image = $request->file('product_image')->getClientOriginalName();
      $path = $request->file('product_image')->storeAs('products', $image, 'public_path');
    } else {
      $path = null;
    }

    $product->update([
      'product_image' => $path,
    ]);

    session()->flash('add', 'Product Image Uploaded Successfully');
    return redirect()->route('products.index');
  }

  public function destroy(Request $request) {
    $product = Product::findorFail($request->id);
    $product->delete();

    session()->flash('delete', 'Product Deleted Successfully');
    return redirect()->route('products.index');
  }
}
