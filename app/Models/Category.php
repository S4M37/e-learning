<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categoriess';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'label'
    ];

    public $timestamps = false;


}