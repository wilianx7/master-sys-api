<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Graduation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'modality_id',
        'name',
    ];

    protected $visible = [
        'id',
        'modality_id',
        'name',
    ];

    public function modality()
    {
        return $this->belongsTo(Modality::class)->with(['graduations', 'plans'])->withDefault();
    }
}
