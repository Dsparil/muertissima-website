<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModelSaveProcess;
use Illuminate\Http\UploadedFile;

class ScenePlanItem extends AbstractModelSaveProcess
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'scene_plan_items';

    public function fillFromForm(array $data, string $id)
    {
        $this->code       = $data['code'];
        $this->name       = $data['name'];
        $this->dimensions = $data['dimensions'];

        $imageObject = request()->file('scenePlanItems')[$id]['image'] ?? null;

        if ($imageObject !== null) {
            $this->image = 'data:'.$imageObject->getClientMimeType().';base64,'.base64_encode(file_get_contents($imageObject->path()));
        }

    }

    public  function isCode(string $code): bool
    {
        return $this->code == $code;
    }
}
