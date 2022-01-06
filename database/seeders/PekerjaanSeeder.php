<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user\Pekerjaan;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pekerjaan::create([
            'id'=>1, 
            'nama'=>'PNS/TNI/POLRI'
        ]);
        Pekerjaan::create([
        'id'=>2, 
            'nama'=>'Swasta'
        ]);
        Pekerjaan::create([
            'id'=>3, 
            'nama'=>'Wiraswasta'
        ]);
    }
}
