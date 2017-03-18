<?php
namespace App\Metiers;

use App\Models\Category;
use App\Models\Exam;

class TrainingServices
{
    public function getTrainingByCategory($id_Category)
    {
        $category = Category::find($id_Category);
        if ($category == null) {
            return response()->json(['response' => 'category not found'], 404);
        } else {
            return response()->json(['response' => Exam::with(['categories', 'items', 'items.choices'])->whereIsTraining(true)->get()]);
        }
    }
}