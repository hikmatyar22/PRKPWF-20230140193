<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {
        Gate::authorize('access-category');
        $categories = Category::withCount('products')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        Gate::authorize('access-category');
        return view('category.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('access-category');
        $request->validate([
            'name' => 'required|unique:category,name|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        Gate::authorize('access-category');
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        Gate::authorize('access-category');
        $request->validate([
            'name' => 'required|unique:category,name,' . $category->id . '|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        Gate::authorize('access-category');
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}