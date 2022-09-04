<?php

namespace Database\Seeders;

use Hatamiarash7\PFaker\PFaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
            DB::table('comments')->insert([
                'writer' => PFaker::fullName(),
                'body' => PFaker::sentence(),
                'article_id' => $item,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
