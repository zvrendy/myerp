<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'mst_produk';
    protected $primaryKey = 'id_produk';
    protected $guarded = ['id_produk'];
    public $timestamps = false;
}
