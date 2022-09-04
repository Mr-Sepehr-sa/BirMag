<?php

namespace Database\Seeders;

use Hatamiarash7\PFaker\PFaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => PFaker::fullName(),
                'email' => PFaker::email(),
                'password' => $faker->password,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
