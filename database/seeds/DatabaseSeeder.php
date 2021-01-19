<?php

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
        // $this->call(UserSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(StatutVideoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
