<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $guardians = [
            [
                'school_id'  => 1,
                'student_id' => 1,
                'first_name' => 'Mohan',
                'last_name'  => 'Reddy',
                'phone'      => '987-654-3210',
                'email'      => 'mohan.reddy@school.com',
                'username'   => 'mohanreddy',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'student_id' => 2,
                'first_name' => 'Sita',
                'last_name'  => 'Sharma',
                'phone'      => '876-543-2109',
                'email'      => 'sita.sharma@school.com',
                'username'   => 'sitasharma',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'student_id' => 3,
                'first_name' => 'Ravi',
                'last_name'  => 'Kumar',
                'phone'      => '765-432-1098',
                'email'      => 'ravi.kumar@school.com',
                'username'   => 'ravikumar',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'student_id' => 4,
                'first_name' => 'Lakshmi',
                'last_name'  => 'Rao',
                'phone'      => '654-321-0987',
                'email'      => 'lakshmi.rao@school.com',
                'username'   => 'lakshmirao',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'student_id' => 5,
                'first_name' => 'Arjun',
                'last_name'  => 'Patel',
                'phone'      => '543-210-9876',
                'email'      => 'arjun.patel@school.com',
                'username'   => 'arjunpatel',
                'password'   => Hash::make('password123'),
            ],
        ];

        foreach ($guardians as $guardian) {
            \App\Models\Guardian::create($guardian);
        }

    }
}
