<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('price');
            $table->string('name');
            $table->string('stripe_id');
        });


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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
