<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModelSaveProcess;

class Rider extends AbstractModelSaveProcess
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'rider';

    public function fillFromForm(array $data, string $id)
    {
        $this->title   = $data['title'];
        $this->content = $data['content'];
    }
}
