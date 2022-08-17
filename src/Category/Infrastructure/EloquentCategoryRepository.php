<?php

declare(strict_types=1);

namespace Src\Category\Infrastructure;

use App\Models\Category as CategoryEloquentModel;
use Src\Category\Domain\Category;
use Src\Category\Domain\CategoryRepository;
use Src\Category\Domain\ValueObjects\CategoryId;
use function PHPUnit\Framework\throwException;

class EloquentCategoryRepository implements CategoryRepository
{
    public CategoryEloquentModel $categoryEloquentModel;

    public function __construct()
    {
        $this->categoryEloquentModel = new CategoryEloquentModel();
    }
    public function save(Category $category): void
    {
        $categoryEloquent = new CategoryEloquentModel();
        $categoryEloquent['name'] = $category->name()->value();
        $categoryEloquent['description'] = $category->description()->value();
        $categoryEloquent->save();
    }
    public function update(Category $category): void
    {
        $categoryEloquent = $this->categoryEloquentModel->query()->find($category->id()->value());

        if($categoryEloquent == null) {
            throwException(new \Exception('Category not found'));
        }

        $categoryEloquent['name'] = $category->name()->value();
        $categoryEloquent['description'] = $category->description()->value();
        $categoryEloquent->save();
    }
    public function find(CategoryId $id): ?Category
    {
        $categoryModel = $this->categoryEloquentModel->query()->find($id->value());
        if(!$categoryModel) {
            return null;
        }
        $categoryDomain =  Category::create(
            $categoryModel['name'],
            $categoryModel['description']
        );

        $categoryDomain->setId($categoryModel['id']);
        return $categoryDomain;
    }
    public function delete(Category $category): void
    {
        $categoryModel = $this->categoryEloquentModel->query()->find($category->id()->value());
        if(!$categoryModel) {
            throwException(new \Exception('Category not found'));
        }
        $categoryModel->delete();
    }
}
