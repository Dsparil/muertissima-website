<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class BandMember extends AbstractModelSaveProcess
{
    use HasFactory;

    public const UPDATED_AT = null;

    protected $table = 'band_members';

    public function fillFromForm(array $data)
    {
        $this->name        = $data['name'];
        $this->instruments = $data['instruments'];
    }
}
