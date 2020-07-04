<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trans extends Model
{
    protected $table = 'trans';
    protected $primaryKey = 'id_trans';
    protected $guarded = ['id_trans'];
    public $timestamps = false;
}
