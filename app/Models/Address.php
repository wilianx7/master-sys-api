<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'description',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'cep',
    ];

    protected $visible = [
        'id',
        'description',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'cep',
    ];

    public function student()
    {
        return $this->hasOne(Student::class)->withDefault();
    }
}
