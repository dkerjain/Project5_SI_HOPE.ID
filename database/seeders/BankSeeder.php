<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bank::create([
            'id'=>1, 
            'nama'=>'BCA'
        ]);
        Bank::create([
        'id'=>2, 
            'nama'=>'BNI'
        ]);
        Bank::create([
            'id'=>3, 
            'nama'=>'BRI'
        ]);
        Bank::create([
            'id'=>4, 
            'nama'=>'BSI'
        ]);
        Bank::create([
            'id'=>5, 
            'nama'=>'Mandiri'
        ]);
    }
}
