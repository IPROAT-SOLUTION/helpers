<?php

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Paginate a collection or array of items.
 *
 * @param mixed $items Items to paginate.
 * @param int $perPage Number of items per page.
 * @param int|null $page Current page number.
 * @param array $options Additional options for pagination.
 * @return LengthAwarePaginator Paginated items.
 */

if (!function_exists('paginateItems')) {
    function paginateItems($items, int $perPage = 5, int $page = null, array $options = []): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
