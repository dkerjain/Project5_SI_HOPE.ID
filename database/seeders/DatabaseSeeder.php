<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SumberdanaSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(PenghasilanSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
