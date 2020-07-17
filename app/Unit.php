<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CompositeKey;

class Unit extends Model
{
    protected $table = 'mst_unit';
    protected $primaryKey = 'id_unit';
    protected $guarded = ['id_unit'];
    public $timestamps = false;
}
