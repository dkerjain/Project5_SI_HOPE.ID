<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incremeting = false;

    protected $table = 'customer';
    protected $fillable = [
        'EMAIL', 'nama_customer','nama_ibukandung','alamat',
        'kota','nomorhp','pekerjaan','sumberdana','penghasilan',
        'fotoktp','fotonpwp','selfiektp','status','bank','nomorrekening'
        
    ];
}
