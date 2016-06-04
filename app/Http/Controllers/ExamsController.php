<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\ExamsServices;
use App\Models\Item;
use Illuminate\Http\Request;

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

    public function submit(Request $request, $id_Exam = null)
    {
        $inputs = $request->input("inputs");
        return $this->examsServices->store($id_Exam, $request->input("id_User"), $inputs);
    }
}
