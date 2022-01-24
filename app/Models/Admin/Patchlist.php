<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModelSaveProcess;

class Patchlist extends AbstractModelSaveProcess
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $table = 'patchlist';

    public function fillFromForm(array $data, string $id)
    {
        $this->input_number          = $data['input_number'];
        $this->band_member_id        = $data['band_member_id'];
        $this->instrument_name       = $data['instrument_name'];
        $this->microphone_type       = $data['microphone_type'];
        $this->microphone_stand_size = $data['microphone_stand_size'];
    }
}
