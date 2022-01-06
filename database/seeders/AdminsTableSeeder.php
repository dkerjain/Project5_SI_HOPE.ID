<?php

namespace Database\Seeders;

use App\Models\admin\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id' => 1,
            'USERNAME' => 'admin1',
            'EMAIL' => 'admin1@app.com',
            'PASSWORD' => bcrypt('admin123')
        ]);
        Admin::create([
            'id' => 2,
            'USERNAME' => 'admin2',
            'EMAIL' => 'admin2@app.com',
            'PASSWORD' => bcrypt('admin123')
        ]);
    }
}
