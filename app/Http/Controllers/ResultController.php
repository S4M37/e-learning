<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\ResultServices;

class ResultController extends Controller
{
    protected $resultServices;

    function __construct(ResultServices $resultServices)
    {
        $this->resultServices = $resultServices;
    }

    public function getResultsForExam($id_Exam = null, $id_Result = null)
    {
        if ($id_Result == null) {
            return $this->resultServices->getAllResultForExam($id_Exam);
        } else {
            return $this->resultServices->getResultById($id_Exam, $id_Result);
        }

    }
    public function getResultsForUser($id_User = null, $id_Result = null)
    {
        if ($id_Result == null) {
            return $this->resultServices->getAllResultForUser($id_User);
        } else {
            return $this->resultServices->getResultById($id_User, $id_Result);
        }

    }
}
