<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'mst_bank';
    protected $primaryKey = 'id_bank';
    protected $guarded = ['id_bank'];
    public $timestamps = false;
}
