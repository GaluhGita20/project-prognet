<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxBunga extends Model
{
    use HasFactory;
    protected $table="trx_bungas";
    protected $fillable=[
        'bulan',
        'tahun',
        'nasabah_id',
        'nominal_bunga',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
