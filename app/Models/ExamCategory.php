<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamCategory extends Model
{
    protected $table = 'exam_category';
    protected $primaryKey = 'id_exam_category';
    protected $fillable = [
        'id_exam', 'id_category'
    ];

    public $timestamps = false;
}
