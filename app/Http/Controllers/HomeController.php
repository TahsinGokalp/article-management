<?php

namespace App\Http\Controllers;

use App\Services\GeneralService;

class HomeController extends Controller
{

    private $general;

    public function __construct(GeneralService $general)
    {
        $this->general = $general;
    }

    public function index()
    {
        $this->general->setTitle('Anasayfa');
        $this->general->getUser();
        return view('home');
    }
}
