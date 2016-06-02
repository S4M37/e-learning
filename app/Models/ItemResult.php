<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemResult extends Model
{
    protected $table = 'item_result';
    protected $primaryKey = 'id_item_result';
    protected $fillable = [
        'id_item', 'id_result', 'response'
    ];
    public $timestamps = false;
}
