<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incremeting = false;

    protected $table = 'pekerjaan';
    protected $fillable = [
        'nama'];
}
