<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use DateTime;

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
            $uploadedFileUrl = cloudinary()->uploadFile('http://via.placeholder.com/1080x720');
            DB::table('articles')->insert([
                'title' => $faker->name,
                'body' => $faker->text,
                'banner' => $uploadedFileUrl->getSecurePath(),
                'banner_id' => $uploadedFileUrl->getPublicId(),
                'should_be_shown' => $faker->boolean,
                'user_id' => rand(1, 10),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
