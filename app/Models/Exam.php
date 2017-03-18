<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'id_exam';
    protected $fillable = [
        'label', 'duration', 'is_training'
    ];
    public $timestamps = false;

    public function items()
    {
        return $this->hasMany('App\Models\Item', 'id_exam', 'id_exam');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'exam_category', 'id_exam', 'id_category');
    }
}
