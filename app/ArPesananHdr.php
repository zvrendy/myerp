<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArPesananHdr extends Model
{
    protected $table = 'ar_pesanan_hdr';
    protected $primaryKey = 'id_sp_h';
    protected $guarded = ['id_sp_h'];
    public $timestamps = false;
}
