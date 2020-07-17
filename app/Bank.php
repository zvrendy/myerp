<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
<<<<<<< HEAD
    protected $table = 'bank';
=======
    protected $table = 'mst_bank';
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    protected $primaryKey = 'id_bank';
    protected $guarded = ['id_bank'];
    public $timestamps = false;
}
