<?php

namespace Database\Seeders;

use App\Models\UserProgram;
use Illuminate\Database\Seeder;

class UserProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserProgram::factory()->count(30)->create();
    }
}
