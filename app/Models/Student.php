<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    use CascadeSoftDeletes;

    protected $cascadeDeletes = ['address'];

    protected $fillable = [
        'address_id',
        'name',
        'birth_date',
        'gender',
        'phone',
        'email',
        'observation',
    ];

    protected $visible = [
        'id',
        'address_id',
        'name',
        'birth_date',
        'gender',
        'phone',
        'email',
        'observation',
        'created_at',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class)->withDefault();
    }
}
