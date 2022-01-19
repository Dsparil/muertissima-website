<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractHydratableModel extends Model
{
    public static function hydrateFromSource(array $data, string $callback = null)
    {
        $items     = [];
        $itemClass = get_called_class();

        foreach ($data as $item) {
            $item = new $itemClass($item);

            if ($callback !== null && !$item->$callback()) {
                continue;
            }

            $items[] = $item;
        }

        return $items;
    }
}