<?php

namespace App\Services;

class GeneralService
{
    public function setTitle($title)
    {
        view()->share('title', $title);
    }

    public function getUser()
    {
        $user = auth()->user();
        view()->share('user', $user);

        return $user;
    }

    public function getClassConstants($class)
    {
        $reflection = new \ReflectionClass($class);

        return $reflection->getConstants();
    }

    public function returnClassConstantsToView($class, $name)
    {
        $constants = $this->getClassConstants($class);
        if (isset($constants['CREATED_AT'])) {
            unset($constants['CREATED_AT']);
        }
        if (isset($constants['UPDATED_AT'])) {
            unset($constants['UPDATED_AT']);
        }
        view()->share($name, $constants);
    }
}
