<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'label'
    ];

    public $timestamps = false;

    function trainings()
    {
        return $this->belongsToMany('App\Models\Exam', 'exam_category', 'id_category', 'id_exam');
    }
}
