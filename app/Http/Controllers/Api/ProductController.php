<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;
    private $categoryService;
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = $this->productService->getProducts();
        return response()->json(
            [
                'products' => $products,
            ]
        );

    }

    public function getProduct($id) {
        $product = $this->productService->getById($id);
        return response()->json(
            [
                'product' => $product,
            ]
        );
    }

    public function categories() {
        return response()->json(
            ['categories' => $this->categoryService->getAll()]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $this->productService->createProduct($request->all());

        return ['product' => $product];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $updatedProduct = $this->productService->updateProduct($request->all());
        return response()->json($updatedProduct);
    }

    /**
     * Delete product.
     */
    public function delete($id) {
        $result = $this->productService->deleteById($id);
        return ['message' => $result];
    }
}
