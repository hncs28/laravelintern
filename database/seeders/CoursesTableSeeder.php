<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('courses')->insert([
                'courseName' => $faker->sentence(3),
                'coursePrice' => rand(100, 1000),
                'cat_id' => rand(1, 10), 
                'lecture_id' => rand(1, 1000), 
            ]);
        }
    }
}
