<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 9; $i++) {
            DB::table('articles')->insert([
                'title' => $faker->name,
                'banner' => $faker->image,
                'body' => $faker->text,
                'should_be_shown' => $faker->boolean,
                'user_id' => rand(1, 10),
            ]);
        }
    }
}
