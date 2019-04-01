<?php

namespace App\Services;

class GeneralService
{

    public function setTitle($title){
        view()->share('title',$title);
    }

    public function getUser(){
        $user = auth()->user();
        view()->share('user',$user);
        return $user;
    }

}
