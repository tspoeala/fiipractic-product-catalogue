<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getProducts()
    {
        return Product::with('category')->orderBy('title')->get();
    }

    public function all()
    {
        return Product::all();
    }

    public function getById($id)
    {
        return Product::with('category')->find($id);
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $message = "Product not found";
        if ($product) {
            $result = $product->delete();
            if ($result) {
                $message = "Product deleted successfully";
            }
        }
        return $message;

    }
    public function update($data, $id = null)
    {
        $product = new Product();
        if ($id) {
            $product = Product::find($id);
        }
        $product->title = $data['title'] ?? $product->title;
        $product->description = $data['cover_url'] ?? $product->cover_url;
        $product->category_id = $data['category_id'] ?? $product->category_id;
        $product->cover_url = $data['cover_url'] ?? $product->cover_url;
        $product->purchase_url = $data['purchase_url'] ?? $product->purchase_url;
        $product->save();

        return $product;

    }
    public function store($data)
    {
        $product = new Product();
        $product->title = $data['title'];
        $product->category_id = $data['category_id'];
        $product->description = $data['description'];
        $product->cover_url = $data['cover_url'];
        $product->purchase_url   = $data['purchase_url'];
        $product->save();

        return $product;

    }
}
