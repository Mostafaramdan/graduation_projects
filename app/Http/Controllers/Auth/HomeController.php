<?php 

namespace App\Http\Controllers\Auth;

class HomeController
{
    public  $adminRoute,$studentRoute;
    public function __construct()
    {
        $this->studentRoute=route('project.index');
        $this->adminRoute=route('project.index');
    }

    public function redirectAfterLogin()
    {
        $authLogged= AuthLogged();
        if($authLogged){
            $redirect = $authLogged->isAdmin()?$this->adminRoute: $this->studentRoute;
            return redirect($redirect);
        }else{
            return redirect(route('website.login'));
        }
    }
}