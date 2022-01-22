<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModelSaveProcess;

class StuffSection extends AbstractModelSaveProcess
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'stuff_sections';

    public function fillFromForm(array $data)
    {
        $this->name = $data['name'];
    }
}
