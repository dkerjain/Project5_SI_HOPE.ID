<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user\Sumberdana;
use Carbon;

class SumberdanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Sumberdana::create([
            'id'=>1, 
            'nama'=>'Gaji',
        ]);
        Sumberdana::create([
        'id'=>2, 
            'nama'=>'Tabungan'
        ]);
        Sumberdana::create([
            'id'=>3, 
            'nama'=>'Orangtua'
        ]);
    }
}
