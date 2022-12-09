<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanPegawai extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'seluruh_jabatan_pegawai';
    protected $fillable = ['id_pegawai', 'jabatan'];
}
