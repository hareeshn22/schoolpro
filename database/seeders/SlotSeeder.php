<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Slot::insert([
            [
                'name' => 'Morning',
            ],
            [
                'name' => 'Afternoon',
            ],
            [
                'name' => 'Extra',
            ]
        ]);

    }
}
