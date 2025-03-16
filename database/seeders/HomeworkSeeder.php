<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HomeworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $homeworks = [
            [
                'school_id'  => 1,
                'teacher_id' => 1,
                'course_id'  => 1,
                'subject_id' => 1,
                'workdate'   => Carbon::now(),
                'content'    => 'Homework content for Subject A',
            ],
            [
                'school_id'  => 1,
                'teacher_id' => 2,
                'course_id'  => 1,
                'subject_id' => 2,
                'workdate'   => Carbon::now(),
                'content'    => 'Homework content for Subject B',
            ],
            [
                'school_id'  => 1,
                'teacher_id' => 3,
                'course_id'  => 3,
                'subject_id' => 3,
                'workdate'   => Carbon::now(),
                'content'    => 'Homework content for Subject C',
            ],
            [
                'school_id'  => 1,
                'teacher_id' => 4,
                'course_id'  => 4,
                'subject_id' => 4,
                'workdate'   => Carbon::now(),
                'content'    => 'Homework content for Subject D',
            ],
        ];
        foreach ($homeworks as $key => $work) {
            \App\Models\Homework::create($work);

        }
        

    }
}
