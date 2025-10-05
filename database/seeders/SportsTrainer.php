<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Trainer;


class SportsTrainer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sportsByCategory = DB::table('sports')
            ->select('id', 'category')
            ->get()
            ->groupBy('category');

        $assignments = [];

        $trainers = Trainer::all();

        foreach ($trainers as $trainer) {
            $sports = $sportsByCategory[$trainer->category] ?? collect();

            $selectedSports = $sports->shuffle()->take(rand(4, 6));

            foreach ($selectedSports as $sport) {
                $assignments[] = [
                    'trainer_id' => $trainer->id,
                    'sport_id' => $sport->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('sport_trainer')->insert($assignments);

    }
}
