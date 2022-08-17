<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Src\Category\Application\CreateCategoryUseCase;
use Src\Category\Infrastructure\CreateCategoryController;
use Src\Category\Infrastructure\DeleteCategoryController;
use Src\Category\Infrastructure\EloquentCategoryRepository;
use Src\Category\Infrastructure\UpdateCategoryController;

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

        $createCategory = new CreateCategoryController();
        $createCategory->__invoke($request->name, $request->description);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category) : View
    {
        return view('admin.Category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $updateCategory = new UpdateCategoryController();
        $updateCategory->__invoke($category->id, $request->name, $request->description);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        //TODO: Solo se puede eliminar si no tiene posts asociados.

        $deleteCategoryController = new DeleteCategoryController();
        $deleteCategoryController($category->id);

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
