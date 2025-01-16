<?php

namespace App\Services;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;

class ProductServices
{
    public function list()
    {
        $products = Product::with('category')->paginate(15);
        return $products;
    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->validated());

        return $product;
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->validated());

        return $product->fresh();
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}
