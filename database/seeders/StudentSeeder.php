<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // database/seeders/StudentSeeder.php

        $students = [
            ['first_name' => 'Arjun', 'last_name' => 'Kumar', 'photo' => null, 'birthdate' => '2008-01-15', 'father_name' => 'Ramesh Kumar', 'gender' => 'Male', 'roll_no' => 1, 'address' => '123, Green Street, Vizag, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Sita', 'last_name' => 'Reddy', 'photo' => null, 'birthdate' => '2008-03-22', 'father_name' => 'Anil Reddy', 'gender' => 'Female', 'roll_no' => 2, 'address' => '456, Blue Lane, Vijayawada, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Pranav', 'last_name' => 'Naidu', 'photo' => null, 'birthdate' => '2008-05-10', 'father_name' => 'Suresh Naidu', 'gender' => 'Male', 'roll_no' => 3, 'address' => '789, Red Road, Guntur, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Kavya', 'last_name' => 'Rao', 'photo' => null, 'birthdate' => '2008-07-18', 'father_name' => 'Rajesh Rao', 'gender' => 'Female', 'roll_no' => 4, 'address' => '101, Yellow Avenue, Tirupati, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Nikhil', 'last_name' => 'Varma', 'photo' => null, 'birthdate' => '2008-09-30', 'father_name' => 'Manoj Varma', 'gender' => 'Male', 'roll_no' => 5, 'address' => '202, Purple Street, Nellore, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Meera', 'last_name' => 'Sharma', 'photo' => null, 'birthdate' => '2008-11-12', 'father_name' => 'Vinay Sharma', 'gender' => 'Female', 'roll_no' => 6, 'address' => '303, Orange Path, Rajahmundry, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Rohit', 'last_name' => 'Deshmukh', 'photo' => null, 'birthdate' => '2008-12-05', 'father_name' => 'Abhay Deshmukh', 'gender' => 'Male', 'roll_no' => 7, 'address' => '404, Violet Lane, Kakinada, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Anjali', 'last_name' => 'Iyer', 'photo' => null, 'birthdate' => '2008-02-25', 'father_name' => 'Raghav Iyer', 'gender' => 'Female', 'roll_no' => 8, 'address' => '505, Brown Street, Anantapur, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Karan', 'last_name' => 'Nair', 'photo' => null, 'birthdate' => '2008-04-17', 'father_name' => 'Satish Nair', 'gender' => 'Male', 'roll_no' => 9, 'address' => '606, White Avenue, Ongole, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],
            ['first_name' => 'Priya', 'last_name' => 'Joshi', 'photo' => null, 'birthdate' => '2008-06-29', 'father_name' => 'Vikas Joshi', 'gender' => 'Female', 'roll_no' => 10, 'address' => '707, Black Road, Kadapa, Andhra Pradesh', 'school_id' => 1, 'course_id' => 1],

        ];
        foreach ($students as $index => $student) {
            \App\Models\Student::create($student);
        }

    }
}
