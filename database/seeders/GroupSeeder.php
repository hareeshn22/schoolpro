<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $groupA = Group::create([
            'school_id'   => 1,
            'course_id'   => 1,
            'name'        => 'Science Explorers',
            'created_by'  => 1, // Teacher ID 1
            'is_archived' => false,
        ]);

        // Create Group B
        $groupB = Group::create([
            'school_id'   => 1,
            'course_id'   => 1,
            'name'        => 'Math Masters',
            'created_by'  => 1, // Teacher ID 2
            'is_archived' => false,
        ]);

        // Assign students exclusively
        $groupA->students()->syncWithoutDetaching(range(1, 3));  // Students 1–5
        $groupB->students()->syncWithoutDetaching(range(4, 6));
        // $groupB->students()->syncWithoutDetaching(range(3, 9)); // Students 6–10

    }
}
