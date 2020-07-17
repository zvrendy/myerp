<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArPesananDtl extends Model
{
    protected $table = 'ar_pesanan_dtl';
    protected $primaryKey = 'id_sp_d';
    protected $guarded = ['id_sp_d'];
    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
