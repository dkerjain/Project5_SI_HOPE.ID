<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';
    public $incremeting = false;

    protected $table = 'admin';
    protected $fillable = [
        'USERNAME', 'PASSWORD','EMAIL'
    ];
}
