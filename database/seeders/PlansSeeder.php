<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('plans')->insert([
            'price' => 199,
            'name' => "Nouvel arrivant",
            'stripe_id' => "price_1J0096BQlJTYhI99rMdPY78y"
        ]);

        DB::table('plans')->insert([
            'price' => 399,
            'name' => "Communauté",
            'stripe_id' => "price_1J2H76BQlJTYhI99lMsk921x"
        ]);

        DB::table('plans')->insert([
            'price' => 599,
            'name' => "Évasion",
            'stripe_id' => "price_1J2fqWBQlJTYhI99ACOHwMwV"
        ]);
    }
}
