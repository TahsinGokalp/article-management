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
        return view('home');
    }
}
