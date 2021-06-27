<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {

            $name = $faker->name();
            $email = $faker->email();
            $created_at = $faker->dateTime();
            DB::table('users')->insert([
                'created_at' => $created_at,
                'updated_at' => $created_at,
                'firstname' => $name,
                'lastname' => $name,
                'email' => $email,
                'password' => Hash::make('Admin123!'),
            ]);
        }
    }
}
