<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArPesananHdr extends Model
{
    protected $table = 'ar_pesanan_hdr';
    protected $primaryKey = 'id_sp_h';
    protected $guarded = ['id_sp_h'];
    public $timestamps = false;
<<<<<<< HEAD

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_cust');
    }
    public function detailPesan()
    {
        return $this->hasMany(ArPesananDtl::class, 'id_sp_d');
    }
=======
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
}
