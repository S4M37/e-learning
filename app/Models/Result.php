<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $primaryKey = 'id_result';
    protected $fillable = [
        'label', 'score', 'observation', 'test_date', 'id_user', 'id_exam'
    ];

    public $timestamps = false;

    public function items_result()
    {
        return $this->hasMany('App\Models\ItemResult', 'id_result');
    }

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam', 'id_exam');
    }

}
