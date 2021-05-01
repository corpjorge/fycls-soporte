<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GlobalWorkplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workplaces')->insert([
            'id' => 1,
            'name' => 'FYCLS Ingenieria',
            'domain' => 'fyclsingenieria.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('workplaces')->insert([
            'id' => 2,
            'name' => 'Fonsodi',
            'domain' => 'fonsodi.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('workplaces')->insert([
            'id' => 3,
            'name' => 'Gmail',
            'domain' => 'gmail.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
