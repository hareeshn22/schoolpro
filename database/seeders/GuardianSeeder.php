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
                'name'       => 'Harish Reddy',
                'phone'      => '987-654-3210',
                'username'   => 'harishreddy',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'student_id' => 2,
                'name'       => 'Sita Sharma',
                'phone'      => '876-543-2109',
                'username'   => 'sitasharma',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'student_id' => 3,
                'name'       => 'Ravi Kumar',
                'phone'      => '765-432-1098',
                'username'   => 'ravikumar',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'student_id' => 4,
                'name'       => 'Lakshmi Rao',
                'phone'      => '654-321-0987',
                'username'   => 'lakshmirao',
                'password'   => Hash::make('password123'),
            ],
            [
                'school_id'  => 1,
                'student_id' => 5,
                'name'       => 'Arjun Patel',
                'phone'      => '543-210-9876',
                'username'   => 'arjunpatel',
                'password'   => Hash::make('password123'),
            ],
        ];
        foreach ($guardians as $guardian) {
            \App\Models\Guardian::create($guardian);
        }

    }
}
