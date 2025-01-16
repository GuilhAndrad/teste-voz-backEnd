<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\CategoryServices;

class CategoryController extends Controller
{
    public function __construct(protected CategoryServices $categoryServices){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryServices->list();

        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = $this->categoryServices->store($request);

        return response()->json($category,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
         // Carrega os produtos relacionados à categoria
        $category->load('products');

        return response()->json($category, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category = $this->categoryServices->update($request, $category);

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->categoryServices->destroy($category);

        return response()->json(["message" => "Categoria deletada!"]); //Só o status code 204 já resolvia, mas a mensagem deixa mais claro.
    }
}
