<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index() {
    $categories = Category::all();
    return view('dashboard.categories.index', compact('categories'));
  }

  public function store(Request $request) {
    $request->validate([
      'category_name' => 'required | unique:categories',
    ]);

    Category::create([
      'category_name' => $request->category_name,
      'category_description' => $request->category_description,
    ]);

    session()->flash('add', 'Category Added Successfully');
    return redirect()->route('categories.index');
  }

  public function update(Request $request) {
    $request->validate([
      'category_name' => 'required | unique:categories,category_name,'.$request->id,
    ]);

    $category = Category::findorFail($request->id);

    $category->update([
      'category_name' => $request->category_name,
      'category_description' => $request->category_description,
    ]);

    session()->flash('edit', 'Category Updated Successfully');
    return redirect()->route('categories.index');
  }

  public function destroy(Request $request) {
    $category = Category::findorFail($request->id);
    $category->delete();

    session()->flash('delete', 'Category Deleted Successfully');
    return redirect()->route('categories.index');
  }
}