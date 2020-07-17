<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'mst_customer';
    protected $primaryKey = 'id_cust';
    protected $guarded = ['id_cust'];
    protected $fillable = ['ktp', 'nama', 'npwp', 'alamat', 'tipe', 'kontak_person', 'nama_dagang', 'alamat_dagang', 'telp', 'fax', 'kode_cabang'];
    public $timestamps = false;
}
