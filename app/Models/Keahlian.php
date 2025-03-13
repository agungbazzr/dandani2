<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $table = 'tb_keahlian';

    protected $fillable = [
      'nama_keahlian','jenis_keahlian','keterangan_keahlian',
    ];
}
