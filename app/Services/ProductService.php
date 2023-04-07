<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ProductService
{
    /**
     * @var ProductRepository $productRepository
     */
    protected $productRepository;

    /**
     * ProductService constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function deleteById($id)
    {
        $product = null;
        DB::beginTransaction();

        try {
            $result = $this->productRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete product data');
        }

        DB::commit();

        return $result;

    }

    public function getAll()
    {
        return $this->productRepository->all();
    }

    public function getProducts()
    {
        $products = $this->productRepository->getProducts();
        foreach ($products as $product) {
            $product->created_at = Carbon::parse($product->created_at)->format('d-m-Y H:i:s');
            $product->updated_at = Carbon::parse($product->updated_at)->format('d-m-Y H:i:s');
        }
        return $products;
    }

    public function getById($id)
    {
        return $this->productRepository->getById($id);
    }

    /**
     * Validate post data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return bool
     */
    public function updateProduct($data)
    {
        $id = null;
        if (isset($data['id'])) {
            $id = $data['id'];
        }
        $validator = Validator::make($data, [
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'cover_url'      => 'required|url',
            'purchase_url'   => 'required|url'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->productRepository->update($data, $id);

        return $result;
    }

    public function createProduct($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'cover_url'      => 'required|url',
            'purchase_url'   => 'required|url'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->productRepository->store($data);

    }
}
