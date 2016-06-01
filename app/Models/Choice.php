<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $table = 'choices';
    protected $primaryKey = 'id_choice';
    protected $fillable = [
        'label','valid','id_item'
    ];
    public $timestamps=false;


}
