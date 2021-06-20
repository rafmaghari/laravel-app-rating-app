<?php
namespace Domain\Item\Services;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemTopTenRateService
{
    public function fetchTopTenRateItems()
    {
        return Item::query()
            ->select(DB::raw('COUNT(ratings.id) as rating_count'), 'items.*')
            ->leftJoin('ratings', 'items.id', 'ratings.item_id')
            ->groupBy('items.id')
            ->orderBy('rating_count',  'DESC')
            ->limit(10)
            ->get();
    }

}