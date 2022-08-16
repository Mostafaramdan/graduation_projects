<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'students';
    protected $fillable = [
        'name',
        'student_ID',
        'password',
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
        'email_verified_at' => 'datetime',
    ];

    function isAdmin(): bool
    {
        return false;
    }

    function project ()
    {
        return $this->belongsToMany(Project::class, 'project_members', 'students_id', 'projects_id');
    }

    function members ()
    {
        return $this->hasMany(ProjectMembers::class, 'students_id');
    }

    function authType()
    {
        return 'student';
    }
}
