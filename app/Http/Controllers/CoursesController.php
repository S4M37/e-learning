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

    function getCourses($id_Course = null)
    {
        if ($id_Course == null) {
            return $this->courcesServices->getAllCourses();
        } else {
            return $this->courcesServices->getCourseById($id_Course);
        }
    }

    function downloadCourse($id_Course = null)
    {
        return $this->courcesServices->downloadCourseById($id_Course);
    }
}
