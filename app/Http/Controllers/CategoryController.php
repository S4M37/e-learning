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
}
