<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->validated());
        return response()->json(['message' => 'Category has been added', 'data' => $category],201);
    }

    public function update(CategoryRequest $request,Category $category): JsonResponse
    {
        return response()->json(['message' => 'Category has been added', 'data' => $category->update($request->validated())]);
    }

    public function destroy(Category $category): JsonResponse
    {
        return response()->json(['message' => 'Category has been deleted', 'data' => $category->delete()]);
    }
}
