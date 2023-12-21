<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        $title = 'Delete Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'category_name' => $request->category_name
        ]);

        return redirect('categories')->with('toast_success', 'Category has been created!');
    }

    public function edit(Category $category)
    {
        $category = Category::findOrFail($category->category_id);

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $category = Category::findOrFail($category->category_id);

        $category->update([
            'category_name' => $request->category_name
        ]);

        return redirect('categories')->with('toast_success', 'Category has been updated!');
    }

    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->category_id);

        $category->delete();

        return redirect('categories')->with('toast_success', 'Category has been deleted!');
    }
}
