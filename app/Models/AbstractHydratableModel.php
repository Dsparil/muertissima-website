<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractHydratableModel extends Model
{
    public static function hydrateFromSource(array $data)
    {
        $items     = [];
        $itemClass = get_called_class();

        foreach ($data as $item) {
            $items[] = new $itemClass($item);
        }

        return $items;
    }
}