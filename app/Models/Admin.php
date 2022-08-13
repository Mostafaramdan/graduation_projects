<?php

namespace App\Models;

use Database\Factories\AdminFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Models\adminsTrait;


class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';
    protected $guarded = [] ;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    function isAdmin(): bool
    {
        return true;
    }
    
}
