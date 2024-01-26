<?php

namespace App\Models;

use App\Constants\SubjectType;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'result_id',
        'subject_name',
        'subject_code',
        'subject_type',
        'theory_marks',
        'practical_marks',
        'theory_max_marks',
        'practical_max_marks'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'subject_type' => SubjectType::class
    ];

    public function result()
    {
        return $this->hasOne(Result::class, 'result_id', 'id');
    }

    public function getTotalAttribute()
    {
        return $this->theory_marks + $this->practical_marks;
    }
}
