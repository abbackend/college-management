<?php

namespace App\Models;

use App\Constants\UserType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'password' => 'hashed',
        'type' => UserType::class
    ];

    public function getNameAttribute()
    {
        $details = $this->details;
        return  $details ? "{$details->first_name} {$details->last_name}" : config('app.name');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->details->date_of_birth)->age;
    }

    public function details()
    {
        return $this->belongsTo(UserDetail::class, 'id', 'user_id');
    }

    public function scopeList($query)
    {
        return $query->where('type', UserType::STUDENT->value);
    }
}
