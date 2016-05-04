<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\CourcesServices;

class CoursesController extends Controller
{
    protected $courcesServices;

    function __construct(CourcesServices $courcesServices)
    {
        $this->courcesServices = $courcesServices;
    }
}
