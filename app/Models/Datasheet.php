<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasheet extends Model
{
    use HasFactory;

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $table = 'datasheet';

    public static function saveProcess(array $data)
    {
        $ds = self::first();

        if ($ds === null) {
            $ds = new self();
        }

        $ds->general_info = $data['general_info'] ?? '';
        $ds->networks     = $data['networks'] ?? '';
        $ds->staff        = $data['staff'] ?? '';
        $ds->languages    = $data['languages'] ?? '';

        $ds->save();
    }
}