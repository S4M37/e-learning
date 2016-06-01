<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemExam extends Model
{
    protected $table = 'it_exams';
    protected $primaryKey = 'id_it_exam';
    protected $fillable = [
        'response','id_item','id_exam','id_result'
    ];
    public $timestamps=false;
}
