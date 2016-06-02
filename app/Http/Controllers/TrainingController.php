<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\TrainingServices;

class TrainingController extends Controller
{
    protected $trainingServices;

    function __construct(TrainingServices $trainingServices)
    {
        $this->trainingServices = $trainingServices;
    }

    public function getTraining($id_Category)
    {
        return $this->trainingServices->getTrainingByCategory($id_Category);
    }
}
