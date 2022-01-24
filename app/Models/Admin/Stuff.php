<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModelSaveProcess;

class Stuff extends AbstractModelSaveProcess
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'stuff';

    public function fillFromForm(array $data, string $id)
    {
        $this->instrument_name = $data['instrument_name'];
        $this->section_id      = $data['section_id'];
        $this->band_member_id  = $data['band_member_id'];
        $this->content         = $data['content'];
    }
}
