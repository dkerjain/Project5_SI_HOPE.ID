<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incremeting = false;

    protected $table = 'bank';
    protected $fillable = [
        'nama'
        
    ];
}
