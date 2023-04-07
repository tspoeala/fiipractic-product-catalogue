<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    /**
     * @var CategoryRepository $categoryRepository
     */
    protected $categoryRepository;

    /**
     * CategoryService constructor.
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->all();
    }

    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }
}
