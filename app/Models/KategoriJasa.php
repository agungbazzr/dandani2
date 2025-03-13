<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriJasa extends Model
{
    protected $table = 'tb_kategori_jasa';

    protected $fillable = [
      'id','nama_kategori_jasa','keterangan_kategori_jasa',
    ];
}
