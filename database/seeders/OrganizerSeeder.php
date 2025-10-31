<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organizer;
use Illuminate\Support\Facades\Hash;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $organizers = [
            // Sports Organizer
            [
                'school_id'  => 1,
                'first_name' => 'Suresh',
                'last_name'  => 'Kumar',
                'email'      => 'suresh.kumar@example.com',
                'phone'      => '9112233445',
                'username'   => 'sureshkumar',
                'password'   => Hash::make('organizer123'),
                'category'   => 'Sports',
            ],

            // Social Arts Organizer
            [
                'school_id'  => 1,
                'first_name' => 'Anita',
                'last_name'  => 'Reddy',
                'email'      => 'anita.reddy@example.com',
                'phone'      => '9876543210',
                'username'   => 'anitareddy',
                'password'   => Hash::make('organizer123'),
                'category'   => 'Social Arts',
            ],

            // Daily Needs Organizer
            [
                'school_id'  => 1,
                'first_name' => 'Kiran',
                'last_name'  => 'Mehta',
                'email'      => 'kiran.mehta@example.com',
                'phone'      => '9866112233',
                'username'   => 'kiranmehta',
                'password'   => Hash::make('organizer123'),
                'category'   => 'Daily Needs',
            ],
            // Physical Fitness Organizer
            [
                'school_id'  => 1,
                'first_name' => 'Rohit',
                'last_name'  => 'Desai',
                'email'      => 'rohit.desai@example.com',
                'phone'      => '9899887766',
                'username'   => 'rohitdesai',
                'password'   => Hash::make('organizer123'),
                'category'   => 'Physical Fitness',
            ],
        ];

        foreach ($organizers as $organizer) {
            Organizer::create($organizer);
        }
    }
}
