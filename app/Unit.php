<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CompositeKey;

class Unit extends Model
{
    protected $table = 'mst_unit';
<<<<<<< HEAD
    protected $primaryKey = 'id_unit';
=======
    protected $primaryKey = ['id_unit', 'kd_unit'];
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    protected $guarded = ['id_unit'];
    public $timestamps = false;
}
