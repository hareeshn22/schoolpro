<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Course;
use Illuminate\Support\Collection;

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
                'first_name' => 'Asha',
                'last_name'  => 'Sharma',
                'gender'     => 'Female',
                'birthdate'  => '1985-04-14',
                'qualify'    => 'B.Ed., M.A. in English',
                'address'    => '123 Maple St., Vizianagaram',
                'phone'      => '9876543210',
                'email'      => 'asha12@school.com',
                'username'   => 'asha.sharma',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'subject_id' => 2,
                'first_name' => 'Rajesh Kumar',
                'last_name'  => 'Singh',
                'gender'     => 'Male',
                'birthdate'  => '1980-09-22',
                'qualify'    => 'B.Sc., M.Ed.',
                'address'    => '456 Oak Ave., Vizianagaram',
                'phone'      => '9876543211',
                'email'      => 'rajesh12@school.com',
                'username'   => 'rajesh.singh',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'subject_id' => 3,
                'first_name' => 'Priya',
                'last_name'  => 'Reddy',
                'gender'     => 'Female',
                'birthdate'  => '1992-12-03',
                'qualify'    => 'B.Ed., M.Sc. in Physics',
                'address'    => '789 Pine Ln., Vizianagaram',
                'phone'      => '9876543212',
                'email'      => 'priya12@school.com',
                'username'   => 'priya.reddy',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'subject_id' => 4,
                'first_name' => 'Aman',
                'last_name'  => 'Verma',
                'gender'     => 'Male',
                'birthdate'  => '1987-06-30',
                'qualify'    => 'B.A., M.Ed.',
                'address'    => '101 Cedar Rd., Vizianagaram',
                'phone'      => '9876543213',
                'email'      => 'aman12@school.com',
                'username'   => 'aman.verma',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'subject_id' => 5,
                'first_name' => 'Neha',
                'last_name'  => 'Patel',
                'gender'     => 'Female',
                'birthdate'  => '1990-11-15',
                'qualify'    => 'B.Ed., M.A. in History',
                'address'    => '102 Birch Blvd., Vizianagaram',
                'phone'      => '9876543214',
                'email'      => 'neha12@school.com',
                'username'   => 'neha.patel',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'subject_id' => 1,
                'first_name' => 'Jayalakshmi',
                'last_name'  => 'Priya',
                'gender'     => 'Female',
                'birthdate'  => '2016-08-21',
                'qualify'    => 'M.A. in Telugu, B.Ed.',
                'address'    => 'Vizianagaram',
                'phone'      => '9876543215',
                'email'      => 'jayalakshmi12@school.com',
                'username'   => 'jayalakshmi.priya',
                'password'   => Hash::make('password123'),
            ],
        ];

        $courses = Course::all()->pluck('id')->toArray(); // Get all course IDs

        $list = collect($courses);

        foreach ($teachers as $key => $teacher) {
           $teach =  \App\Models\Teacher::create($teacher);
           $randomids = [
            1, 
            $list->random(),
            $list->random(),
        ];
           $teach->courses()->attach($randomids); // Attach courses to the teacher
        }

    }
}
