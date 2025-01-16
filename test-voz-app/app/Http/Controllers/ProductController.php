<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductServices;

class ProductController extends Controller
{

    public function __construct(protected ProductServices $productServices){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productServices->list();

        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product = $this->productServices->store($request);

        return response()->json($product,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
         // Carrega os produtos relacionados à categoria
        $product->load('category');

        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product = $this->productServices->update($request, $product);

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productServices->destroy($product);

        return response()->noContent();
    }
}