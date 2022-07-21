<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function index() : View
    {
        $categories = Category::all();
        return view('admin.Category.index', compact('categories'));
    }

    public function create() : View
    {
        return view('admin.Category.create');
    }


    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.Category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        //TODO: Solo se puede eliminar si no tiene posts asociados.
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
