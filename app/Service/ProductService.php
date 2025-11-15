<?php

namespace App\Service;

use App\Models\Product;
use App\Repository\ProductRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected ProductRepositoryInterface $repository
    )
    {
        //
    }

    public function getProducts()
    {
        return $this->repository->all();
    }

    public function findProduct($id)
    {
        return $this->repository->find($id);
    }

    public function createProduct(array $data)
    {
        return $this->repository->create($data);
    }

    public function createProductWithImage(array $data, UploadedFile $image = null)
    {
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);
            $data['images'] = 'products/' . $imageName;
        }

        return $this->repository->create($data);
    }

    public function updateProduct($id, array $data)
    {
        return $this->repository->updateById($id, $data);
    }

    public function updateProductWithImage($id, array $data, UploadedFile $image = null)
    {
        // Get the existing product to preserve image if needed
        $product = $this->findProduct($id);
        
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/products', $imageName);
            $data['images'] = 'products/' . $imageName;
        } else {
            // Preserve existing image if no new image is provided
            $data['images'] = $product->images;
        }

        return $this->repository->updateById($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->repository->delete($id);
    }

    public function getAllProducts()
    {
        return $this->repository->all();
    }
}