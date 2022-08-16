<?php

namespace App\Http\Controllers\ProjectFactory;

use Auth;

class ProjectFactory 
{
    static function index()
    {
        $projectClass;
        switch (AuthLogged()->getTAble()){
            case 'students': 
                $projectClass = new projectStudent();
            break;
            case 'admins': 
                $projectClass = new ProjectAdmin();
            break;
            case 'doctors': 
                $projectClass = new ProjectDoctor();
            break;
            default: 
                $projectClass = new projectStudent();
            break;
        }
        return $projectClass;
    }
}