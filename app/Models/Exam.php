<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';
    protected $primaryKey = 'id_exam';
    protected $fillable = [
        'label', 'duration'
    ];
    public $timestamps = false;

    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'item_exams', 'id_exam', 'id_item');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'exam_category','id_exam','id_category');
    }
}
