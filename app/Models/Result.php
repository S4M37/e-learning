<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $primaryKey = 'id_result';
    protected $fillable = [
        'label', 'score', 'observation','test_date','id_user'
    ];

    public $timestamps=false;

}
