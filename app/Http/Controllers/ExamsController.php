<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\ExamsServices;
use App\Models\Item;

class ExamsController extends Controller
{
    protected $examsServices;

    function __construct(ExamsServices $examsServices)
    {
        $this->examsServices = $examsServices;
    }

    function getExams($id_exam = null)
    {
        if ($id_exam == null) {
            return $this->examsServices->getAllExams();
        } else {
            return $this->examsServices->getExamById($id_exam);
        }
    }

    public function getChoice()
    {
        return Item::with('choices')->get();
    }
}
