<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id_course';
    protected $fillable = [
        'label', 'id_category', 'pdf_path', 'img_path'
    ];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id_category');
    }

}
