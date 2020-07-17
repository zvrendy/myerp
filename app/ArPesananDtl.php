<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArPesananDtl extends Model
{
<<<<<<< HEAD
    protected $table = 'ar_pesanan_dtl';
    protected $primaryKey = 'id_sp_d';
    protected $guarded = ['id_sp_d'];
    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
=======
    //
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
}
