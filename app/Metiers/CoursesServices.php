<?php
namespace App\Metiers;

use App\Models\Course;

class CoursesServices
{

    public function getAllCourses()
    {
        $courses = Course::with('category')->get();
        return response()->json(['response' => $courses], 200);
    }

    public function getCourseById($id_Course)
    {
        $course = Course::with('category')->find($id_Course);
        if ($course == null) {
            return response()->json(['response' => 'course not found'], 404);
        } else {
            return response()->json(['response' => $course], 200);

        }
    }

    public function downloadCourseById($id_Course)
    {
        $course = Course::find($id_Course);
        if ($course == null) {
            return response()->json(['response' => 'course not found'], 404);
        } else {
            $file = public_path() . $course->pdf_path;

            $headers = array(
                'Content-Type: application/pdf',
            );

            return response()->download($file, $course->label . ".pdf", $headers);
        }
    }
}