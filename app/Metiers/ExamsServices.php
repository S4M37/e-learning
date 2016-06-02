<?php
namespace App\Metiers;

use App\Models\Exam;

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

}