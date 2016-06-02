<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\CategoryServices;

class CategoryController extends Controller
{
    protected $categoryServices;

    function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    function getCategories($id_Category = null)
    {
        if ($id_Category != null) {
            return $this->categoryServices->getCategoryById($id_Category);
        } else {
            return $this->categoryServices->getAllCateogries();
        }
    }
}
