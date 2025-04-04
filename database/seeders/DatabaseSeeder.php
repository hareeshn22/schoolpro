<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            SchoolSeeder::class,
            CourseSeeder::class,
            SubjectSeeder::class,
            DaySeeder::class,
            SlotSeeder::class,
            StudentSeeder::class,
            GuardianSeeder::class,
            PrincipalSeeder::class,
            TeacherSeeder::class,
            AttendanceSeeder::class,
            LeaveSeeder::class,
            HomeworkSeeder::class,
            ExamSeeder::class,
            PageSeeder::class,
            PeriodSeeder::class,
            ScheduleSeeder::class,
            FeedbackSeeder::class,
            NewsSeeder::class,
        ]);

    }
}
