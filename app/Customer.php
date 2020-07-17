<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'mst_customer';
    protected $primaryKey = 'id_cust';
    protected $guarded = ['id_cust'];
<<<<<<< HEAD
    protected $fillable = ['ktp', 'nama', 'npwp', 'alamat', 'tipe', 'kontak_person', 'nama_dagang', 'alamat_dagang', 'telp', 'fax', 'kode_cabang'];
=======
    protected $fillable = ['ktp','nama','npwp','alamat','tipe','kontak_person','nama_dagang','alamat_dagang','telp','fax','kode_cabang'];
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
    public $timestamps = false;
}
