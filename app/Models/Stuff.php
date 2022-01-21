<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stuff extends AbstractModelSaveProcess
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'stuff';

    public function fillFromForm(array $data)
    {
        $this->instrument_name = $data['instrument_name'];
        $this->section_id      = $data['section_id'];
        $this->band_member_id  = $data['band_member_id'];
        $this->content         = $data['content'];
    }
}
