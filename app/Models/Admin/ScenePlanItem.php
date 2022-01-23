<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScenePlanItem extends Model
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'scene_plan_items';

    public  function isCode(string $code): bool
    {
        return $this->code == $code;
    }
}
