<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumberdana extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incremeting = false;

    protected $table = 'sumberdana';
    protected $fillable = [
        'nama'
       
    ];
}
