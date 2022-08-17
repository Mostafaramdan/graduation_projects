<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects',
    $fillable=['progress','social_network','suggested_doctors_id','status','name','description','doctors_id','proposal','create_by','created_at'];
    function leader()
    {
        return $this->belongsTo(Student::class,'create_by');
    }

    function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctors_id');
    }

    function members()
    {
        return $this->belongsToMany(Student::class, 'project_members','projects_id','students_id');
    }

}
