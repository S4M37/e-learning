<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\QCMServices;

class QCMController extends Controller
{
    protected $qcmServices;

    function __construct(QCMServices $qcmServices)
    {
        $this->qcmServices = $qcmServices;
    }
}
