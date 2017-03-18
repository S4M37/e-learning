<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'id_item';
    protected $fillable = [
        'label', 'id_category','id_exam'
    ];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');

    }

    public function choices()
    {
        return $this->hasMany('App\Models\Choice', 'id_item');
    }

}
