<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Metiers\CoursesServices;

class CoursesController extends Controller
{
    protected $courcesServices;

    function __construct(CoursesServices $courcesServices)
    {
        $this->courcesServices = $courcesServices;
    }

    function getCourses($id_Courses = null)
    {
        if ($id_Courses == null) {
            return $this->courcesServices->getAllCourses();
        } else {
            return $this->courcesServices->getCourseById($id_Courses);
        }
    }
}
