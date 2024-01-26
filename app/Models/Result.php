<?php

namespace App\Models;

use App\Constants\CourseType;
use App\Constants\ResultStatus;
use App\Constants\UserStatus;
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
        'student_status',
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
        'student_status' => UserStatus::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function marks()
    {
        return $this->hasMany(Mark::class, 'result_id', 'id');
    }

    public function getObtMarksAttribute()
    {
        $marks = $this->marks();
        $theory_marks = $marks->pluck('theory_marks')->sum();
        $practical_marks = $marks->pluck('practical_marks')->sum();

        return $theory_marks + $practical_marks;
    }

    public function getMaxMarksAttribute()
    {
        $marks = $this->marks();
        $theory_marks = $marks->pluck('theory_max_marks')->sum();
        $practical_marks = $marks->pluck('practical_max_marks')->sum();

        return $theory_marks + $practical_marks;
    }

    public function getPercentageAttribute()
    {
        return number_format(($this->obt_marks / $this->max_marks) * 100, 2);    
    }
}
