<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMembers extends Model
{
    use HasFactory;
    protected $table = 'project_members',
    $fillable=['students_id','projects_id'];

}
