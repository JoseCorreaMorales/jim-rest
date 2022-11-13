<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        $rand = range(1, 11);
        for ($i=0; $i <10 ; $i++) { 
            DB::table('products')->insert([
                //'id' => rand(1,11),                
                'id' => $i+2,                
                'name' => $faker -> colorName(),
                'category' => $faker -> name,
                'date' => $faker -> date(),
                'size' => $faker -> name,
                'price' => $i+1,
                'commentary' => $faker -> sentence,
             ]);
         }
 
    }
}
