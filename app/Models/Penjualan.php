<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    protected $primaryKey = 'id_penjualan';

    public $timestamps = false; // karena kamu pakai field 'timestamp' manual

    protected $fillable = [
        'total',
        'timestamp',
    ];

    // RELASI ke detail
    public function detail()
    {
        return $this->hasMany(PenjualanDetail::class, 'id_penjualan', 'id_penjualan');
    }
}