<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBarang extends Model
{
    //
    protected $table = 'barang';


    public function perusahaan(){
        return $this->belongsTo("App\ModelPerusahaan");
    }
}
