<?php

namespace App\Metiers;

use App\Models\Result;

class ResultServices
{

    public function getAllResultForExam($id_Exam)
    {
        return response()->json(['response' => Result::whereIdExam($id_Exam)
            ->with(['items_result', 'exam'])->get()], 200);
    }

    public function getResultById($id_Exam, $id_Result)
    {
        $result = Result::with(['items_result', 'exam'])->find($id_Result);
        if ($result == null) {
            return response()->json(['response' => "result not found"], 404);
        } else {
            return response()->json(['response' => $result], 200);
        }
    }

    public function getAllResultForUser($id_User)
    {
        return response()->json(['response' => Result::whereIdUser($id_User)
            ->with(['items_result', 'exam'])->get()], 200);
    }
}