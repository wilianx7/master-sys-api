<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modality extends Model
{
    use SoftDeletes;
    use CascadeSoftDeletes;

    protected $cascadeDeletes = ['graduations', 'plans'];

    protected $fillable = [
        'name',
    ];

    protected $visible = [
        'id',
        'name',
    ];

    public function graduations()
    {
        return $this->hasMany(Graduation::class);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
