<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemExam extends Model
{
    protected $table = 'it_exams';
    protected $primaryKey = 'id_it_exam';
    protected $fillable = [
        'id_item', 'id_exam'
    ];
    public $timestamps = false;
}
