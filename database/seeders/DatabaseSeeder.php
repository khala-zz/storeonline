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
        DB::table('countries')->insert([
            'country_name' => 'Albania',
            'country_code' => 'AL',
        ]);
        DB::table('countries')->insert([
            'country_name' => 'VietNam',
            'country_code' => 'VN',
        ]);
    }
}
