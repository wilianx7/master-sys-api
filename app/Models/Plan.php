<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'modality_id',
        'name',
        'price',
    ];

    protected $visible = [
        'id',
        'modality_id',
        'name',
        'price',
    ];

    public function modality()
    {
        return $this->belongsTo(Modality::class)->with(['graduations'])->withDefault();
    }
}
