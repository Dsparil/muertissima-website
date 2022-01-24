<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\AbstractModelSaveProcess;

class BandMember extends AbstractModelSaveProcess
{
    use HasFactory;

    public const UPDATED_AT = null;

    protected $table = 'band_members';

    public function fillFromForm(array $data, string $id)
    {
        $this->name        = $data['name'];
        $this->instruments = $data['instruments'];
    }
}
