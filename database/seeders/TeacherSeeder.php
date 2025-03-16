<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $teachers = [
            [
                'school_id'  => 1,
                'subject_id' => 1,
                'name'       => 'Asha Sharma',
                'gender'     => 'Female',
                'birthdate'  => '1985-04-14',
                'qualify'    => 'B.Ed., M.A. in English',
                'address'    => '123 Maple St., Vizianagaram',
            ],
            [
                'school_id'  => 1,
                'subject_id' => 2,
                'name'       => 'Rajesh Kumar',
                'gender'     => 'Male',
                'birthdate'  => '1980-09-22',
                'qualify'    => 'B.Sc., M.Ed.',
                'address'    => '456 Oak Ave., Vizianagaram',
            ],
            [
                'school_id'  => 1,
                'subject_id' => 3,
                'name'       => 'Priya Reddy',
                'gender'     => 'Female',
                'birthdate'  => '1992-12-03',
                'qualify'    => 'B.Ed., M.Sc. in Physics',
                'address'    => '789 Pine Ln., Vizianagaram',
            ],
            [
                'school_id'  => 1,
                'subject_id' => 4,
                'name'       => 'Aman Verma',
                'gender'     => 'Male',
                'birthdate'  => '1987-06-30',
                'qualify'    => 'B.A., M.Ed.',
                'address'    => '101 Cedar Rd., Vizianagaram',
            ],
            [
                'school_id'  => 1,
                'subject_id' => 5,
                'name'       => 'Neha Patel',
                'gender'     => 'Female',
                'birthdate'  => '1990-11-15',
                'qualify'    => 'B.Ed., M.A. in History',
                'address'    => '102 Birch Blvd., Vizianagaram',
            ],
            [
                'school_id'  => 1,
                'subject_id' => 1,
                'name'       => 'Jayalakshmi',
                'gender'     => 'Female',
                'birthdate'  => '2016-08-21',
                'qualify'    => 'M.A. in Telugu, B.Ed.',
                'address'    => 'Vizianagaram',
            ],
        ];

        foreach ($teachers as $teacher) {
            \App\Models\Teacher::create($teacher);
        }

    }
}
