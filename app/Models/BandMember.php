<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandMember extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;

    protected $table = 'band_members';

    public static function saveProcess(array $data)
    {
        $members = self::all();

        foreach ($members as $DBmember) {
            if (!isset($data[$DBmember->id])) {
                $DBmember->delete();
            }
        }

        foreach ($data as $id => $member) {
            if (substr($id, 0, 3) == 'new') {
                $DBmember = new self();
            } else {
                $DBmember = $members->filter(function($item) use ($id) {
                    return $item->id == $id;
                })->first();

                if ($DBmember === null) {
                    throw new Exception('Band Member "'.$id.'"" not found.');
                }
            }

            $DBmember->name        = $member['name'];
            $DBmember->instruments = $member['instruments'];

            $DBmember->save();
        }
    }
}
