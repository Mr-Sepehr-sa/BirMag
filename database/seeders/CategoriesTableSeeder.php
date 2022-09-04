<?php

namespace Database\Seeders;

use Hatamiarash7\PFaker\PFaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,5) as $item){
            DB::table('categories')->insert([
                'name' => PFaker::jobTitle(),
                'slug' => $faker->slug
            ]);
        }
    }
}
