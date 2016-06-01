<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'id_exam';
    protected $fillable = [
        'label','test_date','id_user','id_category'
    ];
}
