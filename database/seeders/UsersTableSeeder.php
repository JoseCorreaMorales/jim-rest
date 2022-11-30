<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Faker\Factory  as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'username' => $faker -> name,
                'email' => $faker -> email,
                'password' => Hash::make('123'),
                'role' => 'admin',
            ]);
        }



        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'username' => $faker->name,
                'email' => $faker->email,
                'password' =>  Hash::make('111'),
                'role' => 'user',
            ]);
        }
    }
}
