<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(CourseTagTableSeeder::class);
        $this->call(TeacherCourseTableSeeder::class);
        $this->call(UserCourseTableSeeder::class);
        $this->call(UserLessonTableSeeder::class);
        $this->call(UserProgramTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
    }
}
