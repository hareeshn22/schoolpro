<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;


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
            ['first_name' => 'Arjun', 'last_name' => 'Kumar', 'username' => 'arjun.kumar', 'password' => 'pass1234', 'birthdate' => '2008-01-15', 'father_name' => 'Ramesh Kumar', 'gender' => 'Male', 'roll_no' => 1, 'address' => '123, Green Street, Vizag, Andhra Pradesh'],
            ['first_name' => 'Sita', 'last_name' => 'Reddy', 'username' => 'sita.reddy', 'password' => 'pass1234', 'birthdate' => '2008-03-22', 'father_name' => 'Anil Reddy', 'gender' => 'Female', 'roll_no' => 2, 'address' => '456, Blue Lane, Vijayawada, Andhra Pradesh'],
            ['first_name' => 'Pranav', 'last_name' => 'Naidu', 'username' => 'pranav.naidu', 'password' => 'pass1234', 'birthdate' => '2008-05-10', 'father_name' => 'Suresh Naidu', 'gender' => 'Male', 'roll_no' => 3, 'address' => '789, Red Road, Guntur, Andhra Pradesh'],
            ['first_name' => 'Kavya', 'last_name' => 'Rao', 'username' => 'kavya.rao', 'password' => 'pass1234', 'birthdate' => '2008-07-18', 'father_name' => 'Rajesh Rao', 'gender' => 'Female', 'roll_no' => 4, 'address' => '101, Yellow Avenue, Tirupati, Andhra Pradesh'],
            ['first_name' => 'Nikhil', 'last_name' => 'Varma', 'username' => 'nikhil.varma', 'password' => 'pass1234', 'birthdate' => '2008-09-30', 'father_name' => 'Manoj Varma', 'gender' => 'Male', 'roll_no' => 5, 'address' => '202, Purple Street, Nellore, Andhra Pradesh'],
            ['first_name' => 'Meera', 'last_name' => 'Sharma', 'username' => 'meera.sharma', 'password' => 'pass1234', 'birthdate' => '2008-11-12', 'father_name' => 'Vinay Sharma', 'gender' => 'Female', 'roll_no' => 6, 'address' => '303, Orange Path, Rajahmundry, Andhra Pradesh'],
            ['first_name' => 'Rohit', 'last_name' => 'Deshmukh', 'username' => 'rohit.deshmukh', 'password' => 'pass1234', 'birthdate' => '2008-12-05', 'father_name' => 'Abhay Deshmukh', 'gender' => 'Male', 'roll_no' => 7, 'address' => '404, Violet Lane, Kakinada, Andhra Pradesh'],
            ['first_name' => 'Anjali', 'last_name' => 'Iyer', 'username' => 'anjali.iyer', 'password' => 'pass1234', 'birthdate' => '2008-02-25', 'father_name' => 'Raghav Iyer', 'gender' => 'Female', 'roll_no' => 8, 'address' => '505, Brown Street, Anantapur, Andhra Pradesh'],
            ['first_name' => 'Karan', 'last_name' => 'Nair', 'username' => 'karan.nair', 'password' => 'pass1234', 'birthdate' => '2008-04-17', 'father_name' => 'Satish Nair', 'gender' => 'Male', 'roll_no' => 9, 'address' => '606, White Avenue, Ongole, Andhra Pradesh'],
            ['first_name' => 'Priya', 'last_name' => 'Joshi', 'username' => 'priya.joshi', 'password' => 'pass1234', 'birthdate' => '2008-06-29', 'father_name' => 'Vikas Joshi', 'gender' => 'Female', 'roll_no' => 10, 'address' => '707, Black Road, Kadapa, Andhra Pradesh'],
        ];

        foreach ($students as $student) {
            Student::create([
                'first_name'  => $student['first_name'],
                'last_name'   => $student['last_name'],
                'username'    => $student['username'],
                'password'    => Hash::make($student['password']),
                'birthdate'   => $student['birthdate'],
                'father_name' => $student['father_name'],
                'gender'      => $student['gender'],
                'roll_no'     => $student['roll_no'],
                'address'     => $student['address'],
                'school_id'   => 1,
                'course_id'   => 1,
                'photo'       => null,
            ]);
        }


    }
}
