<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GlobalUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'role_id' => 1,
            'name' => 'Jorge Eduardo Peralta Guzman',
            'email' => 'corpjorge@hotmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'role_id' => 1,
            'name' => 'John Freddy Moreno',
            'email' => 'john.moreno@fyclsingenieria.com',
            'password' => Hash::make('12342wefdgsasdf@'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'role_id' => 1,
            'name' => 'Asociados',
            'email' => 'Asociados',
            'password' => Hash::make('12342wefdgsasdf@'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'role_id' => 9,
            'name' => 'Eduardo Peralta Jorge Guzman',
            'email' => 'corpjorge@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Models\User::factory(2000)->create();
    }
}
