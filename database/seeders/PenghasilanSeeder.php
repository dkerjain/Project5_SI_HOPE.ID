<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user\Penghasilan;

class PenghasilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Penghasilan::create([
            'id'=>1, 
            'jumlah'=>'<5 Juta'
        ]);
        Penghasilan::create([
        'id'=>2, 
            'jumlah'=>'5-10 Juta'
        ]);
        Penghasilan::create([
            'id'=>3, 
            'jumlah'=>'10-15 Juta'
        ]);
        Penghasilan::create([
            'id'=>4, 
            'jumlah'=>'>15 Juta'
        ]);
    }
}
