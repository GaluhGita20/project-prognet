<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxSimpanan extends Model
{
    use HasFactory;
    protected $table="trx_simpanans";
    protected $fillable=[
        'jenis_trx',
        'nasabah_id',
        'nominal_trx',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
