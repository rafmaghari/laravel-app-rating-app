<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        return response()->json(
            [
                'message' => 'Rating has been add',
                'data' => Rating::updateOrCreate(
                    [
                        'item_id' => $request->item_id,
                        'user_id' => $request->user_id
                    ],
                    ['rating' => $request->rating]
                )
            ],201);
    }

    public function update(Request $request, Rating $rating): JsonResponse
    {
        return response()->json(['message' => 'Rating has been saved', 'data' => $rating->update($request->all())]);
    }

}
