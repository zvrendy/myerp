<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Indonesia;

class MstPegawai extends Model
{
    protected $guarded = [];
    public $incrementing = false;
    protected $table = 'mst_pegawai';
    protected $primaryKey = 'nik';



    public function agama()
    {
        return $this->belongsTo(MstAgama::class, 'kd_agama');
    }

    public function cabang()
    {
        return $this->belongsTo(SysCabang::class, 'kd_cabang');
    }
    public function dept()
    {
        return $this->belongsTo(MstDept::class);
    }
    public function cc()
    {
        return $this->belongsTo(MstCostCenter::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(MstJabatan::class, 'kd_jabatan');
    }
    public function indonesia()
    {
        return $this->belongsTo(Indonesia::class);
    }
}
