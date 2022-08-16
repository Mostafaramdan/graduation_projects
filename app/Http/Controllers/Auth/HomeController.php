<?php 

namespace App\Http\Controllers\Auth;

class HomeController
{
    public  $adminRoute,$studentRoute;
    public function __construct()
    {
        $this->studentRoute=route('project.main');
        $this->adminRoute=route('project.main');
        $this->doctorRoute=route('project.main');
    }

    public function redirectAfterLogin()
    {
        $authLogged= AuthLogged();
        if(!$authLogged) return redirect(route('website.login'));
        if($authLogged->authType()== 'admin')
            $redirect = $this->adminRoute;
        if($authLogged->authType()== 'doctor')
            $redirect = $this->doctorRoute;
        if($authLogged->authType()== 'student')
            $redirect = $this->studentRoute;

        return redirect($redirect);
    }
}