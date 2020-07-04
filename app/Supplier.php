<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supp';
    protected $guarded = ['id_supp'];
    public $timestamps = false;
}
