<?php

namespace Database\Seeders;

use Hatamiarash7\PFaker\PFaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,10) as $item){
            DB::table('articles')->insert([
                'title' => PFaker::word(),
                'slug' => $faker->slug,
                'writer_id' => $item,
                'cat_id' => $item,
                'hashtag' => PFaker::word().'-'.PFaker::word(),
                'body' => PFaker::paragraph(),
                'status' => 1,
                'pic' => $faker->url,
                'created_at' => now(),
                'updated_at' => now()

            ]);
        }
    }
}
