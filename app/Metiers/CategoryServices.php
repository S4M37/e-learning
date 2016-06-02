<?php
namespace App\Metiers;

use App\Models\Category;

class CategoryServices
{

    public function getCategoryById($id_Category)
    {
        $category = Category::find($id_Category);
        if ($category == null) {
            return response()->json(['response' => 'category not found'], 404);
        } else {
            return response()->json(['response' => $category], 200);
        }
    }

    public function getAllCateogries()
    {
        return response()->json(['response' => Category::All()], 200);
    }
}