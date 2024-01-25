<?php

namespace App\Models;

use App\Constants\CourseType;
use App\Constants\ResultStatus;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'course_name',
        'course_code',
        'course_duration',
        'course_duration_type',
        'status',
        'is_published'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'course_duration_type' => CourseType::class,
        'status' => ResultStatus::class,
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
