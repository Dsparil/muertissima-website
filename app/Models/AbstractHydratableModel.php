<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class AbstractHydratableModel extends Model
{
    public static function hydrateFromSource(Collection $data, string $callback = null): Collection
    {
        $items     = new Collection();
        $itemClass = get_called_class();

        foreach ($data as $item) {
            $item = new $itemClass($item);

            if ($callback !== null && !$item->$callback()) {
                continue;
            }

            $items->push($item);
        }

        return $items;
    }
}