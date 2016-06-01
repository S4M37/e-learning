<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curse extends Model
{
    protected $table = 'curses';
    protected $primaryKey = 'id_curse';
    protected $fillable = [
        'label','id_category'
    ];
    public $timestamps=false;

}
