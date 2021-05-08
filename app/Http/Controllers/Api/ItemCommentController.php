<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemCommentController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json(Item::all());
    }


    public function store(): JsonResponse
    {
        return response()->json(['message' => request()->all(), 'data' => Item::create(request()->all())],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemComment  $itemComment
     * @return \Illuminate\Http\Response
     */
    public function show(ItemComment $itemComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemComment  $itemComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemComment $itemComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemComment  $itemComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemComment $itemComment)
    {
        //
    }
}
