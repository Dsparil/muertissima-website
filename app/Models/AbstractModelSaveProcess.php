<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbstractModelSaveProcess extends Model
{
    public static function saveProcess(array $data)
    {
        $modelClass = get_called_class();
        $items      = $modelClass::all();

        foreach ($items as $DBitem) {
            if (!isset($data[$DBitem->id])) {
                $DBitem->delete();
            }
        }

        foreach ($data as $id => $item) {
            if (substr($id, 0, 3) == 'new') {
                $DBitem = new $modelClass();
            } else {
                $DBitem = $items->filter(function($collectionItem) use ($id) {
                    return $collectionItem->id == $id;
                })->first();

                if ($DBitem === null) {
                    throw new \Exception('Band Member "'.$id.'"" not found.');
                }
            }

            $DBitem->fillFromForm($item);

            $DBitem->save();
        }
    }
}