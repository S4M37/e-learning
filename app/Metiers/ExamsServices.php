<?php
namespace App\Metiers;

use App\Models\Exam;
use App\Models\ItemResult;
use App\Models\Result;

class ExamsServices
{

    public function getAllExams()
    {
        return response()->json(['response' => Exam::with(['items', 'items.choices'])->get()], 200);
    }

    public function getExamById($id_exam)
    {
        $exam = Exam::with(['items', 'items.choices'])->find($id_exam);
        if ($exam == null) {
            return response()->json(['response' => 'exam not found'], 404);
        } else {
            return response()->json(['response' => $exam], 200);

        }
    }

    public function store($id_Exam, $id_User, $inputs)
    {
        $total = count($inputs);
        $response = 0;
        foreach ($inputs as &$input) {
            $response += $input;
        }
        $score = $response / $total;
        $result = new Result();
        $result->id_exam = $id_Exam;
        $result->id_user = $id_User;
        $result->test_date = date("Y-m-d");
        $result->score = $score;
        if ($score >= 0.5) {
            $result->label = "succeed";
        } else {
            $result->label = "fail";
        }
        $result->save();

        foreach ($inputs as &$input) {
            $item_result = new ItemResult();
            $item_result->response = $input;
            $item_result->id_result = $result->id_result;
            $item_result->save();
        }
        return response()->json(['response' => Result::with(['items_result', 'exam'])->find($result->id_result)], 200);
    }

}