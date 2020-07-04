<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public $incrementing = false;
    protected $table = 'karyawan';
    protected $primaryKey = 'karyawan_nik';
    protected $guarded =  ['karyawan_nik'];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
    public function setSlugAttribute($value)
    {
         $this->attributes['slug'] = Str::slug($value); 
    }
}
