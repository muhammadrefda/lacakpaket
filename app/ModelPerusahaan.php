<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPerusahaan extends Model
{
    //
    protected $table = 'perusahaan';

    public function barang(){

        return $this->hasOne("App\ModelBarang");
    }
}
