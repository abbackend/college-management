<?php

namespace App\Models;

use App\Constants\Gender;
use App\Constants\UserCategory;
use App\Constants\UserStatus;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'course_duration',
        'enroll_number',
        'roll_number',
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'gender',
        'date_of_birth',
        'category',
        'address',
        'contact_number',
        'profile_image',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'date_of_birth' => 'datetime:Y-m-d',
        'gender' => Gender::class,
        'category' => UserCategory::class,
        'status' => UserStatus::class,
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
