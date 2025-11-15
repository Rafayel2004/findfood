<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\BaseRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;

final class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        Category $model
    )
    {
        parent::__construct($model);
    }

}
