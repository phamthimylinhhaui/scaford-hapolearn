<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::create([
//            'name' => 'Hapo Tester',
//            'email' => 'test@haposoft.com',
//            'password' => bcrypt('12345678')
//        ]);
        DB::table('users')->insert([
            'name' => 'Hapo Tester',
            'email' => 'test@haposoft.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
