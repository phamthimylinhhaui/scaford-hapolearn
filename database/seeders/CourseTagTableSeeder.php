<?php

namespace Database\Seeders;

use App\Models\CourseTag;
use Illuminate\Database\Seeder;

class CourseTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseTag::factory()->count(30)->create();
    }
}
