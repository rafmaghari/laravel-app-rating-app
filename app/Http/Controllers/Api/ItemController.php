<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Domain\Item\Services\ItemTopTenRateService;
use Illuminate\Http\JsonResponse;

class ItemController extends BaseController
{

    public function topTenRatedItem()
    {
        $topTenRatedItems = (new ItemTopTenRateService())->fetchTopTenRateItems();
        return response()->json(['message' => 'Top 10 rated items', 'data' => $topTenRatedItems]);
    }

    public function index(): JsonResponse
    {
        $items = Item::with(
            'user',
            'category',
            'ratings',
            'comments',
            'comments.user'
        )->orderBy('id', 'desc')->get();
        return $this->sendResponse($items, 'Item has been fetched');
    }

    public function show($id): JsonResponse
    {
        $item = Item::with(
            'user',
            'category',
            'ratings',
            'comments',
            'comments.user'
        )->find($id);
        return $this->sendResponse($item, 'Item has been fetched');
    }

    public function store(ItemRequest $request): JsonResponse
    {
        $item = Item::create($request->validated());
        $itemWithData = Item::with('user', 'category', 'ratings', 'comments', 'comments.user')
            ->where('id', $item->id)->first();
        return response()->json(['message' => 'Item has been added', 'data' => $itemWithData], 201);
    }


    public function update(ItemRequest $request, Item $item): JsonResponse
    {
        return response()->json(['message' => 'Item has been updated', 'data' => $item->update($request->validated())]);
    }

    public function destroy(Item $item): JsonResponse
    {
        return response()->json(['message' => 'Item has been delete', 'data' => $item->delete()]);
    }
}
