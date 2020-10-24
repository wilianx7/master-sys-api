<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id',
        'plan_id',
        'due_date',
        'start_date',
        'end_date',
    ];

    protected $visible = [
        'id',
        'student_id',
        'plan_id',
        'due_date',
        'start_date',
        'end_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class)->with(['address'])->withDefault();
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class)->with(['modality.graduations'])->withDefault();
    }
}
