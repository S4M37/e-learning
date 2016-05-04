<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\UserServices;

class UserController extends Controller
{
    protected $userServices;

    function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }
}
