<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemCommentController extends Controller
{
    public function store(): JsonResponse
    {
        $itemComment = Item::find(request()->item_id)->comments()->create(request()->all());
        return response()->json(['message' => 'Comment has benn added.', 'data' => $itemComment],201);
    }

    public function update(Request $request, ItemComment $itemComment): JsonResponse
    {
        return response()->json(['message' => 'Comment has been updated', 'data' => $itemComment->update($request->all())]);
    }

    public function destroy(ItemComment $itemComment): JsonResponse
    {
        return response()->json(['message' => 'Comment has been deleted' ,'data' => $itemComment->delete()]);
    }
}
