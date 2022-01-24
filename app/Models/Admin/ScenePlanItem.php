<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModelSaveProcess;

class ScenePlanItem extends AbstractModelSaveProcess
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'scene_plan_items';

    public function fillFromForm(array $data)
    {
        $this->code       = $data['code'];
        $this->name       = $data['name'];
        $this->dimensions = $data['dimensions'];
        $this->image      = $data['content'];
    }

    public  function isCode(string $code): bool
    {
        return $this->code == $code;
    }
}
