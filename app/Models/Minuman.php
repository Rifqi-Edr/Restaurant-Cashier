<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    use HasFactory;
    protected $table = 'minuman';
    protected $primaryKey = 'id_minuman';

    protected $fillable = [
        'nama_minuman',
        'kategori_minuman',
        'harga_minuman',
        'gambar_minuman'
    ];
}
