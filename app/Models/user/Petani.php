<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $table = 'petani';
    protected $fillable = [
        'nama_pj', 'EMAIL', 'nama_perusahaan', 'alamat', 'kota',
        'longitude', 'latitude', 'accuracy', 'qrcode', 'id_customer'
    ];
}
