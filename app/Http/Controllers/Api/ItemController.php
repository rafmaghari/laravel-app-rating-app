<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class ItemController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Item::all());
    }

    public function store(ItemRequest $request): JsonResponse
    {
        return response()->json(['message' => 'Item has been added', 'data' => Item::create($request->validated())],201);
    }


    public function update(ItemRequest $request,Item $item): JsonResponse
    {
        return response()->json(['message' => 'Item has been updated', 'data' => $item->update($request->validated())]);
    }

    public function destroy(Item $item): JsonResponse
    {
        return response()->json(['message' => 'Item has been delete', 'data' => $item->delete()]);
    }
}
