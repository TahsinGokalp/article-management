<?php

namespace App\Services;

class GeneralService
{

    public function setTitle($title){
        view()->share('title',$title);
    }

}
