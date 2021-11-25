<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;
    protected $table="nasabahs";
    protected $fillable=[
        'name',
        'alamat',
        'no_ktp',
        'telepon',
        'status_aktif',
        'saldo',
        'file',
    ];

    public function history(){
        return $this->hasOne(History::class);
    }

    public function trx_bungas(){
        return $this->hasMany(TrxBunga::class);
    }
}
