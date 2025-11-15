<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\ProductService;
use App\Service\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
        private readonly CategoryService $categoryService
    ) {}

    /**
     * Display a listing of products grouped by categories.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories = Category::with('products')->get();
        
        // Add full image URLs to each product
        $categories->each(function ($category) {
            $category->products->each(function ($product) {
                if ($product->images) {
                    // Handle both cases: with and without 'storage/' prefix
                    if (str_starts_with($product->images, 'storage/')) {
                        $product->image_url = asset($product->images);
                    } else {
                        $product->image_url = asset('storage/' . $product->images);
                    }
                } else {
                    $product->image_url = null;
                }
            });
        });
        
        return response()->json($categories);
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = $this->productService->findProduct($id);
        
        // Load the category relationship
        $product->load('category');
        
        // Add full image URL to the product
        if ($product->images) {
            // Handle both cases: with and without 'storage/' prefix
            if (str_starts_with($product->images, 'storage/')) {
                $product->image_url = asset($product->images);
            } else {
                $product->image_url = asset('storage/' . $product->images);
            }
        } else {
            $product->image_url = null;
        }
        
        return response()->json($product);
    }
}