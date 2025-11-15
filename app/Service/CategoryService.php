<?php

namespace App\Service;

use App\Repository\CategoryRepositoryInterface;

class CategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    ) {
        //
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }

    public function findCategory($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }

    public function updateCategory($id, array $data)
    {
        return $this->categoryRepository->updateById($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }
}